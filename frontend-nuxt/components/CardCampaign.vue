<template>
  <div class="bg-gray-100 p-56">
    <div class="w-96 m-auto">
      <div
        class="grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
      >
        <div class="col-span-3 row-span-4 p-1 m-1">
          <a href="#">
            <img
              src="https://picsum.photos/640/400/?random"
              alt="Placeholder"
              class="rounded-t-xl object-cover h-48 w-full"
            />
          </a>
        </div>

        <div class="col-span-3 row-span-1">
          <div class="flex align-bottom flex-col leading-none p-2 md:p-4">
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
                <span class="ml-2 text-sm"> John Doe </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-span-3 row-span-1">
          <header
            class="flex items-center justify-between leading-tight p-2 md:p-4"
          >
            <h1 class="text-lg">
              <a class="no-underline hover:underline text-black" href="#">
                Title
              </a>
            </h1>
            <p class="text-grey-darker text-sm">9 min ago</p>
          </header>
        </div>

        <div class="col-span-3 row-span-1">
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
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.hide-scroll-bar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.hide-scroll-bar::-webkit-scrollbar {
  display: none;
}
</style>
