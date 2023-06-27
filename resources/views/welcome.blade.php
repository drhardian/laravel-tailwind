<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <section class="bg-gray-50 min-h-screen flex items-center justify-center">
            <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5">
                <div class="w-1/2 px-16">
                    <h2 class="font-bold text-2xl">Login</h2>
                    <p class="text-sm mt-4">If you already a member, easily log in</p>

                    <form action="" class="flex flex-col gap-4">
                        <input class="p-2 mt-8 rounded-xl border" type="text" name="email" id="" placeholder="Email">
                        <input class="p-2 rounded-xl border" type="password" name="password" id="" placeholder="Password">
                        <button>Login</button>
                    </form>
                </div>
                <div class="w-1/2 sm:block hidden">
                    <img class="rounded-2xl" src="{{ asset('login-img.jpg') }}" alt="">
                </div>
            </div>
        </section>
    </body>
</html>
