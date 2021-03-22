<template>
  <div class="">
    <section
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
        <!-- Mending diganti dengan sesuatu yg menunjukkan utk buat campaign baru -->
      <!-- <div
        class="relative items-center text-gray-900 mb-10 xs:mb-5 w-1/2 xs:w-full mx-auto"
      >
        <input
          type="search"
          name="serch"
          placeholder="Cari apa? contoh: Netflix, Udemy"
          class="bg-gray-100 w-full h-10 px-5 py-6 pr-10 rounded-full text-md focus:outline-none shadow-md"
        />
        <button type="submit" class="absolute right-0 top-0 mt-4 mr-4">
          <svg
            class="h-4 w-4 fill-current focus:outline-none hover:scale-100"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1"
            id="Capa_1"
            x="0px"
            y="0px"
            viewBox="0 0 56.966 56.966"
            style="enable-background: new 0 0 56.966 56.966"
            xml:space="preserve"
            width="512px"
            height="512px"
          >
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
            />
          </svg>
        </button>
      </div> -->
      <!-- min-h-screen min-w-screen -->
      <div class="flex flex-col items-center bg-white">
        <!-- flex-col -->
        <div
          class="flex flex-col-reverse items-center justify-center mx-auto lg:flex-row lg:max-w-6xl lg:p-0 xs:p-0 xs:top-0"
        >
          <div class="w-full lg:pr-10 rounded-lg md:w-2/3 lg:w-1/2 group">
            <div class="relative xs:px-10">
              <img
                src="/home_cinema.svg"
                class="z-10 object-cover w-full h-full"
              />
            </div>
          </div>
          <div
            class="container flex flex-col w-full px-5 lg:pr-12 mb-16 text-2xl text-gray-700 lg:w-1/2 sm:px-0 md:px-10 sm:items-center lg:items-start lg:mb-0"
          >
            <h1
              class="font-sans text-4xl font-extrabold leading-none text-black sm:text-5xl xl:text-6xl sm:text-center lg:text-left"
            >
              <!-- <span
                class="relative bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-yellow-200"
              ></span> -->
              <span class="">Watch Together,</span>
              <span class="block text-yellow-400">Pay Together.</span>
            </h1>
            <p
              class="block mt-6 text-base text-gray-600 xl:text-lg sm:text-center lg:text-left"
            >
              Platform yang memfasilitasi pencarian teman dalam berlanggaan
              bersama di penyedia layanan hiburan hingga edukasi/pembelajaran
              dengan proses yang mudah, aman, dan murah.
            </p>
            <div class="relative flex flex-row mt-10 mx-auto lg:ml-0">
              <a
                href="#section2"
                class="flex items-center px-5 py-3 mx-3 rounded-md text-base text-white transition bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                >Mulai Patungan
                <svg
                  class="ml-2 animate-bounce w-4 h-4 text-amber-900"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 26 26"
                  stroke="currentColor"
                >
                  <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
              </a>
              <NuxtLink
                to="campaign/create"
                class="flex items-center px-5 py-3 mx-3 rounded-md text-base text-gray-700 transition bg-white border-yellow-400 border-2 hover:bg-yellow-400"
                >Buat Campaign
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Carousel from '@/components/Carousel/Carousel'

export default {
  name: 'Landing',
  data() {
    return {}
  },
}
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
.landing-pic {
  width: 500px;
}
</style>
