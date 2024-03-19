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
    <section class="min-h-screen flex items-center justify-center bg-center bg-gray-700">
        <div class="grid grid-cols-3 w-full h-screen">
            <div class="bg-white col-span-2 bg-cover bg-no-repeat bg-[url('/public/theme/assets/images/login-bg-1.jpg')]"></div>
            <div class="bg-gray-200 text-center xl:px-16 px-5 flex items-center">
                <div class="w-full xl:px-16 px-5 mx-4">
                    <div class="text-left w-full">
                        <h2 class="font-bold xl:text-2xl text-xl text-[#002D74]">Sign In</h2>
                        <p class="xl:text-sm text-xs text-[#002D74]">If you already a member, easily log in</p>
                    </div>

                    <form action="{{ route('auth.process') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <input class="p-2 mt-3 rounded-xl border" type="text" name="email" placeholder="Email">
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
                            class="bg-[#295398] rounded-xl text-white py-2 hover:scale-105 duration-300">Sign In</button>
                    </form>

                    <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                        <hr class="border-gray-300">
                        <p class="text-center text-sm">OR</p>
                        <hr class="border-gray-300">
                    </div>

                    <div>
                        <button
                            class="bg-white border py-2 w-full font-semibold rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300">
                            Register
                        </button>
                    </div>

                    <div class="mt-5 text-xs border-b border-gray-300 py-4">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="fixed bottom-0 left-0 z-20 w-full p-3 bg-white border-t border-gray-200 shadow flex items-center justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://ptcs.co.id/" class="hover:underline">PT. Control Systems Arena Para Nusa</a>. All Rights Reserved.</span>
            <ul class="flex flex-wrap items-center mt-3 xl:pr-12 text-sm font-medium text-gray-500 sm:mt-0 xl:gap-4">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Terms of Use</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Brand Policy</a>
                </li>
            </ul>
        </footer>
    </section>
</body>
</html>
