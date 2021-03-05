<template>
  <div class="mx-auto relative">
    <!-- Slides -->
    <div v-for="slide in slides" :key="slide">
      <!-- bakal diubah nanti paddingnya yaa, ini disesuaikan kontennya (text 1/5) -->
      <div
        v-show="activeSlide === slide"
        class="p-4 md:p-24 font-bold text-5xl lg:flex xs:grid items-center bg-indigo-500 text-black rounded-lg"
      >
        <!-- content -->
        <div
          class="bg-gray-300 h-48 xs:h-32 lg:-mr-10 w-full rounded-lg bg-cover bg-center"
          style="
            background-image: url(https://images.unsplash.com/photo-1521185496955-15097b20c5fe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1951&q=80;;;
          "
        ></div>

        <div class="w-full bg-white lg:-ml-10 my-2 shadow-lg rounded-lg p-5">
          <div class="py-3">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Ini Judul
            </h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-600">Alamat Email</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                  baguspurnama98@gmail.com
                </dd>
              </div>
            </dl>
            <dl>
              <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-600">Password</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0">yukNonton#01</dd>
              </div>
            </dl>
            <dl>
              <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-600">Nomor Telepon</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0">0897432123124</dd>
              </div>
            </dl>
          </div>
        </div>
        <!-- content -->
      </div>
    </div>

    <!-- Prev/Next Arrows -->
    <div class="absolute inset-0 flex">
      <div class="flex items-center justify-start w-1/2">
        <button
          class="bg-indigo-100 shadow-md text-indigo-500 hover:text-red-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
          @click.prevent="
            activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1
          "
        >
          <span class="text-2xl">&#8592;</span>
        </button>
      </div>
      <div class="flex items-center justify-end w-1/2">
        <button
          class="bg-indigo-100 shadow-md text-indigo-500 hover:text-red-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6"
          @click.prevent="
            activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1
          "
        >
          <span class="text-2xl">&#8594;</span>
        </button>
      </div>
    </div>

    <!-- Buttons -->
    <div class="w-full flex items-center justify-center px-4">
      <div v-for="slide in slides" :key="slide">
        <button
          class="flex-1 w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-indigo-600 hover:shadow-lg"
          :class="{
            'bg-red-600': activeSlide === slide,
            'bg-indigo-300': activeSlide !== slide,
          }"
        ></button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Carousel",
  data() {
    return {
      activeSlide: 1,
      slides: [1, 2, 3, 4, 5],
    };
  },
};
</script>
