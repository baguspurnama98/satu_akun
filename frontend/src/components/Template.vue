<template>
<div class="hello">

    <!-- component card untuk promo paket streaming -->
    <div class="flex items-center justify-center">
        <div class="bg-white shadow-lg rounded mb-4 course">
            <div class="course-preview">
            </div>
            <div class="course-info">
                <h6 class="text-sm">Paket Premium</h6>
                <h1 class="font-bold text-3xl subpixel-antialiased">
                    Netflix
                </h1>
                <div class="py-3 mb-3">
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Kapasitas Maksimum 4 orang</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">4 perangkat bersamaan</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Bayar ketika grup penuh</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Tagihan bulanan murah</div>
                    </div>
                </div>
                <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-red-500 hover:bg-red-600 focus:bg-red-700" type="submit">
                    Selengkapnya
                </button>
            </div>
        </div>
    </div>
    <!-- component card untuk promo paket streaming -->

    <!-- component login -->
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
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
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- component informasi berlangganan dashboard -->
    <div class="grid grid-cols-8 gap-8 items-start mt-8 mx-auto px-8 w-full">
        <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
            <div class="rounded-lg mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 relative netflix">
                <div class="px-12 pt-6 pb-8 flex">
                    <h1 class="text-4xl font-bold text-white">Netflix</h1>
                    <div class="ml-auto">
                        <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="aktif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-green-500" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- component ini kalau sudah berlangganan -->
            <div class="flex justify-center -mt-4">
                <div class="bg-white shadow-md rounded-lg px-4 pt-10 pb-4 w-3/4">
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2">email@gmail.com</span>
                    </div>
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2">apriaja</span>
                    </div>
                    <div class="pt-3 inline-flex items-center">
                        <div class="text-red-500 bg-red-100 rounded-full">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <strong>22/11/2020</strong>
                    </div>
                </div>
            </div>
            <!-- component ini kalau sudah berlangganan -->
        </div>

        <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
            <div class="rounded-lg mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 relative spotify">
                <div class="px-12 pt-6 pb-8 flex">
                    <h1 class="text-4xl font-bold text-white">Spotify</h1>
                    <div class="ml-auto">
                        <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="aktif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-green-500" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- component ini kalau sudah berlangganan -->
            <div class="flex justify-center -mt-4">
                <div class="bg-white shadow-md rounded-lg px-4 pt-10 pb-4 w-3/4">
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2">email@gmail.com</span>
                    </div>
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2">apriaja</span>
                    </div>
                    <div class="pt-3 inline-flex items-center">
                        <div class="text-red-500 bg-red-100 rounded-full">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <strong>22/11/2020</strong>
                    </div>
                </div>
            </div>
            <!-- component ini kalau sudah berlangganan -->
        </div>

        <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
            <div class="rounded-lg mb-4 mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 relative steam">
                <div class="px-12 pt-6 pb-8 flex">
                    <h1 class="text-4xl font-bold text-white">Steam</h1>
                    <div class="ml-auto">
                        <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="tidak aktif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-red-500" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- component ini kalau belum berlangganan -->
            <div class="mt-4">
                <button class="px-4 py-2 rounded text-white inline-block bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                    Berlangganan
                </button>
            </div>
            <!-- component ini kalau belum berlangganan -->
        </div>

        <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
            <div class="rounded-lg mb-4 mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 relative disney">
                <div class="px-12 pt-6 pb-8 flex">
                    <h1 class="text-4xl font-bold text-white">Disney+</h1>
                    <div class="ml-auto">
                        <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="tidak aktif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-red-500" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- component ini kalau belum berlangganan -->
            <div class="mt-4">
                <button class="px-4 py-2 rounded text-white inline-block bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                    Berlangganan
                </button>
            </div>
            <!-- component ini kalau belum berlangganan -->
        </div>
    </div>
    <!-- component informasi berlangganan dashboard -->
</div>
</template>

<script>
export default {
    name: "HelloWorld",
    props: {
        msg: String,
    },
};
</script>
