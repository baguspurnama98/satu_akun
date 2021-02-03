<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div
      class="z-0 relative grid grid-cols-1 w-full sm:grid-cols-2 sm:px-5 sm:py-5 sm:gap-x-8 md:py-5"
    >
      <div
        class="z-10 col-start-1 row-start-1 px-4 sm:pt-5 pt-40 bg-gradient-to-t from-black sm:bg-none"
      >
        <p
          class="text-md xs:tetx-xs font-medium text-white sm:mb-1 sm:text-gray-500"
        >
          Netflix
        </p>
        <h2
          class="text-xl font-semibold text-white sm:text-2xl sm:leading-7 sm:text-black md:text-3xl"
        >
          Patungan Beli Akun Dicoding selama 1 tahun bebas kelas apa saja yang
          ada, yuk murah meriah
        </h2>
      </div>

      <div class="col-start-1 row-start-3 space-y-3 px-4 xs:py-4">
        <p class="flex items-center text-black text-md xs:text-sm font-normal">
          <img
            alt="Placeholder"
            class="block rounded-full mr-2"
            src="https://picsum.photos/48/48/?random"
          />
          Dibuat oleh
          <a
            class="text-md xs:text-sm px-1 font-medium text-indigo-500"
            href="#"
          >
            Bagus Purnama Putra
          </a>
        </p>
      </div>
      <div class="col-start-1 row-start-1 flex sm:col-start-2 sm:row-span-3">
        <div class="w-full grid">
          <div class="relative col-span-3 row-span-2 md:col-span-2">
            <img
              src="https://picsum.photos/640/400/?random"
              alt=""
              class="absolute inset-0 w-full h-full object-cover bg-gray-100 rounded-lg"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Detail_Campaign',
}
</script>
