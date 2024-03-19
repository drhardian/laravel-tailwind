<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $maxAttempts = 3;

    public function authLogin()
    {
        return view('authentication.login');
    }

    public function authProcess(AuthRequest $request)
    {
        $this->checkTooManyAttempts();

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            RateLimiter::clear($this->throttleKey());

            $request->session()->regenerate();

            // return redirect()->intended('/request_order/dashboard/internal');
            return redirect()->intended('home');
        }

        RateLimiter::hit($this->throttleKey(), 60);

        return back()->withErrors([
            'errors' => __('auth.failed'),
            'attempts' => 'Remaining '.(intval(RateLimiter::remaining($this->throttleKey(), $this->maxAttempts))+1).' login attempts'
        ])->withInput();
    }

    public function throttleKey()
    {
        return Str::lower(request('username')).'|'.request()->ip();
    }

    public function checkTooManyAttempts()
    {
        if(RateLimiter::tooManyAttempts($this->throttleKey(), $this->maxAttempts)) {
            $availableIn = RateLimiter::availableIn($this->throttleKey());
            abort(429, ($availableIn));
        }

        return;
    }

    public function authLogout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerate();

            return redirect('/');
        } catch (\Throwable $th) {
            abort(500);
        }
    }
}
