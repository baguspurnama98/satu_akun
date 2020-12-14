<template>
<div class="">

    <div class="flex flex-wrap items-center justify-center">
        <!-- component card untuk promo paket streaming -->
        <div class="bg-white shadow-lg rounded m-4 course">
            <div class="course-preview">
            </div>
            <div class="course-info w-full">
                <h6 class="text-sm">Paket Premium</h6>
                <h1 class="font-bold text-3xl subpixel-antialiased">
                    Netflix
                </h1>
                <div class="py-3 mb-3">
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-indigo-400 hover:bg-indigo-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Kapasitas Maksimum 4 orang</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-indigo-400 hover:bg-indigo-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">4 perangkat bersamaan</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-indigo-400 hover:bg-indigo-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Bayar ketika grup penuh</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-indigo-400 hover:bg-indigo-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Tagihan bulanan bersaing</div>
                    </div>
                </div>
                <button class="px-4 py-2 rounded text-white inline-block bg-red-500 hover:bg-red-600 focus:bg-red-700" type="submit">
                    Selengkapnya
                </button>
            </div>
        </div>
        <!-- component card untuk promo paket streaming -->

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
                        <span class="font-bold text-gray-700 mr-2 subpixel-antialiased">email@gmail.com</span>
                    </div>
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2 subpixel-antialiased">apriaja</span>
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
                        <span class="font-bold text-gray-700 mr-2 subpixel-antialiased">email@gmail.com</span>
                    </div>
                    <div class="text-left">
                        <span class="font-bold text-gray-700 mr-2 subpixel-antialiased">apriaja</span>
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

    <!-- component hero keunggulan -->
    <section class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="text-center mb-10">
                <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4"><b>Satu Akun</b> saja cukup</h1>
                <p class="text-base leading-relaxed ">
                Nikmati layanan berbagi akun dengan <b>Satu Akun</b> dengan mudah.
                </p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 p-8 sm:flex-row flex-col">
                        <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0">
                            <svg fill="currentColor" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Mudah dan legal untuk patungan</h2>
                            <p class="leading-relaxed text-base">Kami carikan kamu teman untuk patungan membeli akun premium. Masing-masing akan mendapatkan informasi akun yang digunakan pada dashboard pribadi</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 p-8 sm:flex-row flex-col">
                        <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-red-100 text-red-500 flex-shrink-0">
                            <svg fill="currentColor" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Pembayaran apa saja</h2>
                            <p class="leading-relaxed text-base">Tidak perlu pakai kartu kredit, kamu disini cukup bayar pakai media pembayaran apa saja. Bisa pakai e-wallet atau rekening bank kesayangan kamu</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 p-8 sm:flex-row flex-col">
                        <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 flex-shrink-0">
                            <svg fill="currentColor" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Data kamu aman</h2>
                            <p class="leading-relaxed text-base">Kami berusaha semaksimal mungkin jaga keamanan data kamu biar tidak disalahgunakan. Tapi maling punya seribu cara. Pastikan kamu baca kebijakan privasi layanan ini</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center" href="">Selengkapnya
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 p-8 sm:flex-row flex-col">
                        <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-500 flex-shrink-0">
                            <svg fill="currentColor" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Harga bersaing</h2>
                            <p class="leading-relaxed text-base">Kami berikan harga yang kompetitif, harga mahasiswa. Coba lihat penawaran yang kami berikan di skema harga. Ingin minta diskon? Boleh, mari kita diskusikan</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center" href="">Selengkapnya
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</template>

<script>

export default {
    name: "HelloWorld",
    data() {
        return {
            toggleModel:false
        };
    },
    component: {
        // SweetModal,
    },
    props: {
        msg: String,
    },
   methods: {
        openModal () {
    // this.crtSelectedItem = { ...item };
     this.$refs.modal.show()
  }
 }
}
// new Vue({
//   el: '#app',
//   methods: {
//     parentHandler: function () {
//       this.$refs.modal1.close();
//       this.$refs.modal2.open();
//     }
//   }
// });

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
