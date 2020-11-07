<template>
<div class="hello">

    <main class="flex-grow flex justify-center items-center">
        <div class="grid grid-cols-8 gap-8 items-start mt-8 mx-auto px-8 w-full">

            <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
                <div class="bg-white rounded-lg mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 netflix">
                    <div class="px-12 pt-6 pb-8 flex">
                        <h1 class="text-4xl text-bold text-white">Netflix</h1>
                        <div class="ml-auto">
                            <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="aktif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-green-500" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center -mt-4">
                    <div class="bg-white shadow-md rounded-lg px-4 py-6">
                        <div class="text-left">
                            <span class="font-bold text-gray-700 mr-2">Apriyantotobing8@gmail.com</span>
                        </div>
                        <div class="text-left">
                            <span class="font-bold text-gray-700 mr-2">apriaja</span>
                        </div>
                        <div class="text-left pt-3">
                            selesai: <b>22/11/2020</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
                <div class="bg-white rounded-lg mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 spotify">
                    <div class="px-12 pt-6 pb-8 flex">
                        <h1 class="text-4xl text-bold text-white">Spotify</h1>
                        <div class="ml-auto">
                            <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="aktif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-green-500" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center -mt-4">
                    <div class="bg-white shadow-md rounded-lg px-4 py-6">
                        <div class="text-left">
                            <span class="font-bold text-gray-700 mr-2">Apriyantotobing8@gmail.com</span>
                        </div>
                        <div class="text-left">
                            <span class="font-bold text-gray-700 mr-2">apriaja</span>
                        </div>
                        <div class="text-left pt-3">
                            selesai: <b>22/11/2020</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
                <div class="bg-white rounded-lg mb-4 mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 steam">
                    <div class="px-12 pt-6 pb-8 flex">
                        <h1 class="text-4xl text-bold text-white">Steam</h1>
                        <div class="ml-auto">
                            <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="tidak aktif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-red-500" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-400 hover:bg-blue-500 focus:bg-blue-600" type="submit">
                        Berlangganan
                    </button>
                </div>
            </div>

            <div class="col-span-8 sm:col-span-8 md:col-span-4 xl:col-span-2">
                <div class="bg-white rounded-lg mb-4 mr-4 ml-4 shadow-lg hover:shadow-xl transition duration-200 disney">
                    <div class="px-12 pt-6 pb-8 flex">
                        <h1 class="text-4xl text-bold text-white">Disney+</h1>
                        <div class="ml-auto">
                            <span class="flex rounded-full bg-white px-2 py-1 mt-4" title="tidak aktif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-red-500" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-400 hover:bg-blue-500 focus:bg-blue-600" type="submit">
                        Berlangganan
                    </button>
                </div>
            </div>

        </div>

    </main>

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

<style scoped>
.netflix {
    background-color: #f76363;
    background-image: var(--svg-pattern-dashboard);
    background-position: center;
}

.spotify {
    background-color: #5deb97;
    background-image: var(--svg-pattern-dashboard);
    background-position: center;
}

.steam {
    background-color: #686868;
    background-image: var(--svg-pattern-dashboard);
    background-position: center;
}

.disney {
    background-color: #4c95ff;
    background-image: var(--svg-pattern-dashboard);
    background-position: center;
}
</style>
