<template>
  <!-- <div class="flex flex-col justify-center items-center"> -->
  <!-- Content disini -->
  <!-- <Carousel /> -->

  <!-- </div> -->
  <div
    class="min-w-screen min-h-screen flex items-start justify-center px-5 py-5"
  >
    <div
      class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden"
      style="max-width: 1000px"
    >
      <div class="md:flex w-full">
        <div class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10">
          <img src="~/assets/img/press_play.svg" />
        </div>
        <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
          <div class="text-center mb-5">
            <h1 class="font-bold text-3xl text-indigo-500">Daftar</h1>
          </div>
          <div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-3">
                <label for="" class="text-xs font-semibold px-1">Email</label>
                <div class="flex">
                  <div
                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"
                  >
                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                  </div>
                  <input
                    type="email"
                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                    placeholder="johnsmith@example.com"
                  />
                </div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-3">
                <label for="" class="text-xs font-semibold px-1"
                  >Password</label
                >
                <div class="flex">
                  <div
                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"
                  >
                    <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                  </div>
                  <input
                    type="password"
                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                    placeholder="************"
                  />
                </div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-12">
                <label for="" class="text-xs font-semibold px-1"
                  >WhatsApp</label
                >
                <div class="flex">
                  <div
                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"
                  >
                    <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                  </div>
                  <input
                    type="text"
                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                    placeholder="08123456xxxx"
                  />
                </div>
              </div>
            </div>
            <div class="flex -mx-3">
              <div class="w-full px-3 mb-5">
                <button
                  class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                >
                  Daftar Sekarang
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import Carousel from '@/components/Carousel/Carousel'

export default {
  name: 'Register',
  layout: 'default',
  // components: { Carousel },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
