<template>
  <div
    class="flex flex-col overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mb-2"
  >
    <a href="/campaign/1">
      <div class="col-span-4 relative">
        <img
          src="https://picsum.photos/640/400/?random"
          alt="Placeholder"
          class="rounded-t-xl object-cover h-48 xs:h-24 w-full"
        />

        <div
          class="bg-indigo-500 absolute bottom-0 right-0 p-2 rounded-tl-lg xs:p-1"
        >
          <p class="font-semibold text-white text-md sm:text-sm xs:text-xs">
            Rp. 53.000<span class="font-normal">/orang</span>
          </p>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <header
          class="flex items-center justify-between leading-tight pt-1 px-2"
        >
          <h1 class="text-lg xs:text-xs font-medium truncate">
            {{ title }}
          </h1>
        </header>
      </div>

      <div class="col-span-3 row-span-1">
        <a class="text-sm xs:text-xs px-2 text-gray-700" href="#">
          <span class="font-medium text-indigo-500">Bagus Purnama Putra</span>
        </a>
      </div>

      <div class="col-span-3 row-span-1">
        <!-- <h1 class="text-sm px-2">Lama Campaign: <span>1 Bulan</span></h1> -->
        <div class="flex-1 pt-1 pb-0 inline-flex items-center">
          <svg
            class="h-4 w-4 text-black-300 ml-2 mr-1"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="{2}"
              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
          <p class="text-sm xs:text-xs">
            <span class="text-gray-900 font-medium">1</span> Bulan
          </p>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <div class="grid grid-cols-2 px-2 pt-0">
          <div class="col-start-1 col-end-3">
            <span class="text-sm xs:text-xs">Jumlah anggota:</span>
          </div>

          <div class="col-end-7 col-span-2">
            <span class="text-sm xs:text-xs text-gray-700"> 3/6 </span>
          </div>
        </div>
      </div>

      <div class="px-2 pb-2 pt-1 w-full">
        <div
          class="bg-gray-300 h-4 p-1 w-full rounded-full items-center justify-center relative"
        >
          <span
            class="bg-indigo-600 h-2 absolute rounded-full"
            style="width: 66%"
          ></span>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <div
          class="grid grid-cols-3 gap-4 items-center justify-between leading-tight px-2 pb-2"
        >
          <!-- <div class="col-span-2 flex align-bottom flex-col leading-none">
            <div class="flex flex-row justify-between items-center">
              <a
                class="flex items-center no-underline hover:underline text-black"
                href="#"
              >
                <img
                  alt="Placeholder"
                  class="block rounded-full"
                  src="https://picsum.photos/32/32/?random"
                />
                <span class="ml-1 text-sm xs:text-xs">Bagus Purnama Putra</span>
              </a>
            </div>
          </div> -->
          <!-- <div class="col-start-1 col-end-3">
            <span class="text-sm xs:text-xs">Tenggang waktu:</span>
          </div> -->

          <div class="col-end-7 col-span-2">
            <span class="text-red-900 text-sm xs:text-xs">3 hari lagi </span>
          </div>
        </div>
      </div>

      <div></div>
    </a>
  </div>
</template>
<script>
export default {
  name: 'CardCampaign',
  props: ['title'],
}
</script>
<style>
.hide-scroll-bar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.hide-scroll-bar::-webkit-scrollbar {
  display: none;
}
</style>
