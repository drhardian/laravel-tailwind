<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

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
            'username' => $request->username,
            'password' => $request->password
        ])) {
            RateLimiter::clear($this->throttleKey());
            
            $request->session()->regenerate();

            return redirect()->intended('dashboard/');
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
