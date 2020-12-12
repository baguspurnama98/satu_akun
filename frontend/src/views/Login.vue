<template>
      <!-- component login -->
        <div class="w-full max-w-md m-4">
            <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
                <!-- @csrf -->
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    Silahkan Login
                </div>
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email" required autofocus placeholder="Email" />
                </div>
                <div class="mb-6">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>
                <div class="flex items-center justify-between">
                    <button class="px-4 py-2 rounded text-white inline-block bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
        <!-- component login -->
</template>