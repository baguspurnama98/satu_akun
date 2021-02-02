<template>
  <!-- <div class="bg-gray-100 p-56">-->
  <!-- <div class=""> -->
  <div
    class="flex flex-col overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out mb-2"
  >
    <a href="#">
      <div class="col-span-4 relative">
        <!-- <a href="#"> -->
        <img
          src="https://picsum.photos/640/400/?random"
          alt="Placeholder"
          class="rounded-t-xl object-cover h-48 w-full"
        />
        <!-- </a> -->
        <div class="bg-indigo-500 absolute bottom-0 right-0 p-2 rounded-l-lg">
          <p class="font-bold text-white">Rp. 53.000/Orang</p>
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
        <h1 class="text-sm px-2">Lama Campaign: <span>1 Bulan</span></h1>
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
      <!-- <div class="col-span-3 row-span-1">
      <ul
        class="flex flex-row pl-2 text-gray-600 overflow-x-scroll hide-scroll-bar"
      >
        <li class="py-1">
          <div
            class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
          >
            <a class="" href="#">#hogehoge</a>
          </div>
        </li>
        <li class="py-1">
          <div
            class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
          >
            <a class="" href="#">#fugafuga</a>
          </div>
        </li>

        <li class="py-1">
          <div
            class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
          >
            <a class="" href="#">#foofoo</a>
          </div>
        </li>
        <li class="py-1">
          <div
            class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
          >
            <a class="" href="#">#barbarbar</a>
          </div>
        </li>
        <li class="py-1">
          <div
            class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
          >
            <a class="" href="#">#hogefugafoo</a>
          </div>
        </li>
      </ul>
    </div> -->

      <div class="col-span-3 row-span-1">
        <div class="flex items-center justify-between leading-tight p-1 md:p-2">
          <div class="flex align-bottom flex-col leading-none">
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
                <span class="ml-1 text-sm"> Bagus Purnama </span>
              </a>
            </div>
          </div>
          <p class="text-red-900 text-sm">3 Hari Lagi</p>
        </div>
      </div>

      <div></div>
    </a>
  </div>
  <!-- </div> -->
  <!--  </div> -->
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
