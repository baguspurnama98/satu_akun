<template>
  <div class="">
    <section
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div class="flex flex-col items-center bg-white">
        <!-- flex-col -->
        <div
          class="flex flex-col-reverse items-center justify-center mx-auto lg:flex-row lg:max-w-6xl lg:p-0 xs:p-0 xs:top-0"
        >
          <div class="w-full lg:pr-10 rounded-lg md:w-2/3 lg:w-1/2 group">
            <div class="relative xs:px-4">
              <div v-once ref="animation"></div>
            </div>
          </div>
          <div
            class="container flex flex-col w-full px-5 lg:pr-12 mb-4 text-2xl text-gray-700 lg:w-1/2 sm:px-0 md:px-10 sm:items-center lg:items-start lg:mb-0"
          >
            <h1
              class="font-sans text-4xl font-extrabold leading-none text-black sm:text-5xl xl:text-6xl sm:text-center lg:text-left"
            >
              <!-- <span
                class="relative bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-yellow-200"
              ></span> -->
              <span class="">Cara Aman,</span>
              <span class="block text-green-own">Buat Patungan.</span>
            </h1>
            <p
              class="block mt-6 text-base text-gray-600 xl:text-lg sm:text-center lg:text-left"
            >
              Platform yang memfasilitasi pencarian teman dalam berlanggaan bersama di penyedia layanan hiburan hingga edukasi/pembelajaran dengan proses yang mudah, aman, dan murah.
            </p>
            <div class="relative flex flex-row mt-10 mx-auto lg:ml-0">
              <a
                href="#campaign"
                class="flex items-center px-5 py-3 mx-3 rounded-md text-base text-white transition bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                style="text-align: center"
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
                class="flex items-center px-5 py-3 mx-3 rounded-md text-base text-gray-700 transition bg-white border-green-own border-2 bg-green-own"
                style="text-align: center"
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
import lottie from 'lottie-web'
import * as landingAnimation from '~/assets/lottie/landing.json'

export default {
  name: 'Landing',
  data() {
    return {}
  },
  mounted() {
    //   https://lottiefiles.com/38964-group-of-people-communicating
    // https://assets4.lottiefiles.com/packages/lf20_5e7wgehs.json
    lottie.loadAnimation({
      container: this.$refs['animation'], // the dom element that will contain the animation
      renderer: 'svg',
      loop: true,
      autoplay: true,
      animationData: landingAnimation.default,
    })
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
.border-green-own {
  border-color: #ffad4d;
}
.bg-green-own:hover {
  background-color: #ffad4d;
  color: white;
}
</style>
