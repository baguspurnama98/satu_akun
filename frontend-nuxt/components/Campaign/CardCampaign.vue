<template>
  <div
    class="flex flex-col justify-between rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mb-2"
  >
    <a href="/campaign/1">
      <div class="col-span-4 relative">
        <img
          src="https://picsum.photos/640/400/?random"
          alt="Placeholder"
          class="rounded-t-lg object-cover h-48 xs:h-24 w-full"
        />

        <div
          class="bg-indigo-500 absolute bottom-0 right-0 p-2 rounded-tl-md xs:py-1"
        >
          <p class="font-bold text-white text-md sm:text-sm xs:text-xs">
            Rp53.000<span class="font-normal">/orang</span>
          </p>
        </div>
      </div>

      <!-- Content here, make padding -->
      <div class="px-3 mt-4 relative h-48">
        <div class="col-span-3 row-span-1">
          <header
            class="flex items-center justify-between leading-tight max-h-0.5"
          >
            <h1 class="text-xl xs:text-base font-medium line-clampin">
              {{ title }}
            </h1>
          </header>
        </div>

        <div class="col-span-3 row-span-1 truncate">
          <a class="text-sm" href="#">
            <span class="font-medium text-indigo-500">Bagus Purnama Putra</span>
          </a>
        </div>

        <div class="col-span-3 row-span-1 pt-1 pb-0">
          <!-- <h1 class="text-sm px-2">Lama Campaign: <span>1 Bulan</span></h1> -->
          <div class="inline-flex">
            <svg
              class="h-5 w-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <p class="ml-1 text-sm">
              1 Bulan
            </p>
          </div>
        </div>

        <!-- Stick to the bottom: caranya? parent kasih relative, child kasih absolute dan bottom-0 -->
        <div class="absolute inset-x-0 bottom-0 px-3">
          <div class="col-span-3 row-span-1">
            <div class="grid grid-cols-2 pt-0">
              <div class="col-start-1 col-end-3">
                <span class="text-sm">Jumlah anggota:</span>
              </div>

              <div class="col-end-7 col-span-2">
                <span class="text-sm text-gray-700"> 3/6 </span>
              </div>
            </div>
          </div>

          <div class="pb-2 pt-1 w-full">
            <div
              class="bg-gray-300 h-4 p-1 w-full rounded-full items-center justify-center relative"
            >
              <span
                class="bg-indigo-500 h-2 absolute rounded-full"
                style="width: 66%"
              ></span>
            </div>
          </div>

          <div class="col-span-3 row-span-1 pb-4">
            <div
              class="grid grid-cols-3 gap-4 items-center justify-between leading-tight"
            >
              <div class="col-end-7 col-span-2">
                <span class="text-red-700 text-sm">3 hari lagi </span>
              </div>
            </div>
          </div>
        </div>
      </div>
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

.line-clampin {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
</style>
