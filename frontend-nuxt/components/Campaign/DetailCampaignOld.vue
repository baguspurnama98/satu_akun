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
        <h2
          class="text-xl font-semibold text-white sm:text-2xl leading-tight sm:text-black md:text-3xl my-5"
        >
          Patungan Beli Akun Dicoding selama 1 tahun bebas kelas apa saja yang
          ada, yuk murah meriah
        </h2>
      </div>

      <div class="col-start-1 row-start-3 space-y-3 px-4 xs:py-4">
        <p class="flex items-center text-black text-md xs:text-sm font-normal">
          Oleh:
          <a
            class="text-md xs:text-sm px-1 font-medium text-indigo-500"
            href="#"
          >
            Bagus Purnama Putra
          </a>
        </p>
        <!-- Social Medianya si host biar terpercaya jika dia daftarin di kita (hanya inputin username akunnya aja) -->
        <span class="inline-flex lg:ml-auto lg:mt-0 mt-6 w-full md:w-auto">
          <!-- Nanti ambil data dari database, kalau dia punya ig, maka class hidden di nonaktifin -->
          <a class="text-gray-500">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path
                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="0"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                stroke="none"
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
              ></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-start-1 row-start-1 flex sm:col-start-2 sm:row-span-3">
        <div class="w-full grid">
          <div class="relative col-span-3 row-span-2 md:col-span-2">
            <img
              src="https://picsum.photos/640/400/?random"
              alt=""
              class="absolute inset-0 w-full h-full object-cover bg-gray-100 rounded-md"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Bikin grid sistem lagi, bagi dua kolom, kolom kiri nunjukin berapa slot, kolom kanan ada deskripsi dan tombol daftar sekarang -->
    <div
      class="z-0 relative grid grid-cols-1 w-full md:grid-cols-2 sm:px-5 sm:py-5 sm:gap-x-8 md:py-5"
    >
      <div class="col-start-1 pl-3 my-5">
        <h1
          class="font-semibold text-xl text-gray-700 subpixel-antialiased text-center"
        >
          Daftar Peserta
        </h1>
        <div class="my-3">
          <!-- Bakal di looping dari props data dari backend, siapa yg tergabung saat ini, ada pengecekan sudah beneran aktif atau tidak -->
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-gray-100 hover:bg-indigo-100 rounded-md px-2 py-2 my-2"
          >
            <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
            <div class="font-medium px-2">Apriyanto JPL Tobing</div>
          </div>
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-gray-100 hover:bg-indigo-100 rounded-md px-2 py-2 my-2"
          >
            <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
            <div class="font-medium px-2">Bagus Alexander</div>
          </div>
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-gray-100 hover:bg-indigo-100 rounded-md px-2 py-2 my-2"
          >
            <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
            <div class="font-medium px-2">Jesse Purnama</div>
          </div>
          <!-- ingat ada gray nih, bisa styling class based on data active or pending -->
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-gray-100 hover:bg-indigo-100 rounded-md px-2 py-2 my-2"
          >
            <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
            <div class="font-medium px-2">Anastasya Eka</div>
          </div>
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-green-100 rounded-md px-2 py-2 my-2"
          >
            <!-- kalau ada slot kosong nanti maka penambahan kelas hidden di span berikut, dan kelas di atasnya ada penambahan kelas background nya hijau, hovernya di hapus -->
            <!-- bisa diimplementasiin styling class seleksi kondisi -->
            <!-- <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span> -->
            <div class="font-medium px-2">Slot Kosong</div>
          </div>
          <div
            class="flex justify-start cursor-pointer text-gray-700 bg-green-100 rounded-md px-2 py-2 my-2"
          >
            <!-- <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span> -->
            <div class="font-medium px-2">Slot Kosong</div>
          </div>
        </div>
      </div>
      <div class="pl-3 my-5">
        <h1
          class="font-semibold text-xl text-gray-700 subpixel-antialiased text-center"
        >
          Deskripsi
        </h1>
        <div class="w-full">
          <span>Lama kampanye akun: 1 bulan</span>
        </div>
        <div class="w-full">
          <span>Harga yang harus dibayarkan: 53 ribu</span>
        </div>
        <p class="my-3">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only
          five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with
          the release of Letraset sheets containing Lorem Ipsum passages, and
          more recently with desktop publishing software like Aldus PageMaker
          including versions of Lorem Ipsum.
        </p>
        <div class="text-center my-5 md:my-10">
          <button
            class="w-1/2 py-2 rounded text-white inline-block shadow-xs bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
            type="submit"
          >
            Daftar
          </button>
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
