<template>
  <div>
    <section
      class="h-full w-full border-box lg:px-24 md:px-16 sm:px-8 px-8 transition-all duration-500 linear"
    >
      <div style="font-family: 'Poppins', sans-serif">
        <div
          class="container mx-auto flex items-center justify-center flex-col"
        >
          <div v-once ref="animation" class="xs:-mt-20 -mt-40"></div>

          <div class="text-center w-full -mt-20">
            <h1
              class="title-text-2-3 text-2xl my-5 font-semibold text-indigo-500"
            >
              Opss! Halaman Tidak Ditemukan
            </h1>
            <div class="flex justify-center">
              <!-- harus href agar reload -->
              <a
                href="/"
                class="inline-flex items-center px-5 py-3 rounded-md text-base text-white transition bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                style="background: #524eee; font-family: 'Poppins', sans-serif"
              >
                Kembali ke beranda
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import lottie from 'lottie-web'
import * as notFoundAnimation from '~/assets/lottie/404.json'

export default {
  props: ['error'],
  layout: 'error', // you can set a custom layout for the error page
  mounted() {
    console.log(this.error)
    lottie.loadAnimation({
      container: this.$refs['animation'], // the dom element that will contain the animation
      renderer: 'svg',
      loop: true,
      autoplay: true,
      animationData: notFoundAnimation.default,
    })
  },
}
</script>
