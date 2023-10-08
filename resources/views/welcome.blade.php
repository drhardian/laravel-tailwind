<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="min-h-screen flex items-center justify-center bg-center bg-no-repeat bg-[url('/public/theme/assets/images/login-bg-image.jpeg')]">
        <div>
            @if ($errors->all())
                <div class="mb-3">
                    <div id="alert-1" role="alert"
                        class="bg-red-50 border-l-2 w-full border-red-400 text-red-800 text-sm p-3 mb-1 flex justify-between">
                        <div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p>
                                    <span class="font-bold">Info:</span>
                                </p>
                            </div>
                            <div class="mt-3">
                                <ul class="list-disc ml-10">
                                    @foreach ($errors->all() as $messages)
                                        <li>{{ $messages }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div>
                            <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
                <div class="md:w-1/2 px-16">
                    <h2 class="font-bold text-2xl text-[#002D74]">Login</h2>
                    <p class="text-sm mt-4 text-[#002D74]">If you already a member, easily log in</p>

                    <form action="{{ route('auth.process') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username">
                        <div class="relative">
                            <input class="p-2 rounded-xl border w-full" type="password" name="password"
                                placeholder="Password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                                class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </div>
                        <button type="submit"
                            class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
                    </form>

                    <div class="mt-10 grid grid-cols-3 items-center text-gray-400">
                        <hr class="border-gray-300">
                        <p class="text-center text-sm">OR</p>
                        <hr class="border-gray-300">
                    </div>

                    <button
                        class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300">
                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="25px"
                            preserveAspectRatio="xMidYMid" viewBox="0 0 256 262" id="google">
                            <path fill="#4285F4"
                                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027">
                            </path>
                            <path fill="#34A853"
                                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1">
                            </path>
                            <path fill="#FBBC05"
                                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782">
                            </path>
                            <path fill="#EB4335"
                                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251">
                            </path>
                        </svg>
                        Login with Google
                    </button>

                    <div class="mt-5 text-xs border-b border-gray-300 py-4">Forgot your password?</div>

                    <div class="mt-3 text-xs flex justify-between items-center">
                        <p>Don't have an account?</p>
                        <button
                            class="py-1 px-3 bg-white border rounded-lg font-semibold hover:scale-110 duration-300">Register</button>
                    </div>
                </div>
                <div class="w-1/2 md:block hidden">
                    <img class="rounded-2xl" src="{{ asset('theme/assets/images/ptcs.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
