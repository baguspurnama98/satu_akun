<template>
  <div
    class="flex flex-col overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mb-2"
  >
    <a href="/campaign/1">
      <div class="col-span-4 relative">
        <img
          src="https://picsum.photos/640/400/?random"
          alt="Placeholder"
          class="rounded-t-xl object-cover h-48 w-full"
        />

        <div class="bg-indigo-500 absolute bottom-0 right-0 p-2 rounded-l-lg">
          <p class="font-bold text-white">Rp. 53.000/orang</p>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <header
          class="flex items-center justify-between leading-tight p-1 md:p-2"
        >
          <h1 class="text-md">Sharing Account Netflix 1 Bulan</h1>
        </header>
      </div>

      <div class="col-span-3 row-span-1">
        <!-- <h1 class="text-sm px-2">Lama Campaign: <span>1 Bulan</span></h1> -->
        <div class="flex-1 inline-flex items-center">
          <svg
            class="h-5 w-5 text-black-300 mx-2"
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
          <p><span class="text-gray-900 font-bold">1</span> Bulan</p>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <h1 class="text-sm px-2">Jumlah anggota:</h1>

        <div class="px-3 py-2 w-full">
          <div class="bg-gray-300 h-2 w-full rounded-full relative">
            <span
              class="bg-indigo-600 h-2 absolute left-0 top-0 rounded-full"
              style="width: 50%"
            ></span>
          </div>
          <div class="relative flex mt-2 text-xs text-gray-600">
            <span class="absolute right-0"> 3/6 </span>
          </div>
        </div>
      </div>

      <div class="col-span-3 row-span-1">
        <div
          class="grid grid-cols-3 gap-4 flex items-center justify-between leading-tight p-1 md:p-2"
        >
          <div class="col-span-2 flex align-bottom flex-col leading-none">
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
          </div>
          <div class="">
            <p class="text-red-900 text-sm xs:text-xs">3 Hari Lagi</p>
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
