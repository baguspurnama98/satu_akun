<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div class="m-3">
      <h3 class="font-bold py-3 text-xl">Buat Campaign</h3>
      <div class="bg-blue-100 p-3 rounded-lg">
        <p class="xs:text-xs">
          Pastikan campaign Anda sesuai dengan
          <b>syarat dan ketentuan Berpatungan.com</b>. Berpatungan menghimbau
          untuk menjalankan campaign yang wajar atau campaign Anda dapat
          diturunkan oleh Berpatungan.com sesuai S&K yang berlaku.
        </p>
      </div>
    </div>

    <section
      class="m-3 w-full py-2 px-8 border rounded-md shadow-md bg-white xs:pl-2"
    >
      <div class="my-4 xs:my-2">
        <h5 class="font-semibold py-3 text-xl inline xs:text-md">
          Upload Foto
        </h5>
        <span
          class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
          >Opsional</span
        >
      </div>
      <div class="mb-3">
        <p class="text-md xs:text-xs">Format gambar .jpg .jpeg .png</p>
      </div>
      <div
        class="px-10 pb-5 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          id="empty-cover-art"
          class="rounded w-full py-16 xs:py-8 text-center opacity-50 md:border-solid md:border-2 md:border-gray-400"
        >
          <svg
            class="mx-auto feather feather-image"
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <circle cx="8.5" cy="8.5" r="1.5"></circle>
            <polyline points="21 15 16 10 5 21"></polyline>
          </svg>
          <div class="py-4">Tambah Foto</div>
        </div>
      </div>
    </section>

    <section
      class="m-3 w-full py-2 px-8 border rounded-md shadow-md bg-white xs:pl-2"
    >
      <div class="my-4 xs:my-2">
        <h5 class="font-semibold py-3 text-xl inline xs:text-md">
          Informasi Campaign
        </h5>
      </div>
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Judul Campaign
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Wajib</span
          >
          <p class="text-xs pr-20">
            Tulis judul campaign Anda dengan singkat, padat dan jelas
          </p>
        </div>
        <div class="sm:col-span-2">
          <div>
            <input
              type="text"
              class="w-full xs:ml-4 border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded-lg xs:text-xs"
              placeholder="Contoh: Akun Sharing Netflix 1 Bulan"
            />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Deskripsi
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Opsional</span
          >
          <p class="text-xs pr-20">
            Tulis deskripsi campaign Anda sedetail mungkin
          </p>
        </div>

        <div class="sm:col-span-2">
          <div>
            <textarea
              class="w-full xs:ml-4 h-96 border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded-lg xs:text-xs"
              placeholder="Contoh: Akun Sharing Netflix 1 Bulan "
              rows="5"
            />
          </div>
        </div>
      </div>
    </section>

    <section
      class="m-3 w-full py-2 px-8 border rounded-md shadow-md bg-white xs:pl-2"
    >
      <div class="my-4 xs:my-2">
        <h5 class="font-semibold py-3 text-xl inline xs:text-md">
          Harga Campaign
        </h5>
      </div>
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Jumlah Slot
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Wajib</span
          >
        </div>

        <div class="sm:col-span-2">
          <div>
            <input
              type="number"
              value="2"
              min="2"
              max="20"
              class="w-full xs:ml-4 border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded-lg xs:text-xs"
              placeholder="Contoh: Akun Sharing Netflix 1 Bulan"
            />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-2">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Harga/slot
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Wajib</span
          >
        </div>

        <div class="sm:col-span-2">
          <div class="mt-1 relative rounded-md shadow-sm">
            <div
              class="absolute inset-y-0 left-0 pl-3 xs:pl-6 flex items-center pointer-events-none"
            >
              <span class="text-gray-500 sm:text-sm"> Rp. </span>
            </div>
            <input
              type="text"
              name="price"
              id="price"
              class="border focus:outline-none focus:ring focus:border-indigo-400 p-2 xs:ml-4 xs:text-xs block w-full pl-16 pr-12 rounded-lg"
              placeholder="0"
            />
          </div>
        </div>
      </div>
    </section>

    <section
      class="m-3 w-full py-2 px-8 border rounded-md shadow-md bg-white"
      id="informationProduct"
    >
      <div class="my-4">
        <h5 class="font-semibold py-3 text-xl inline">Waktu Campaign</h5>
        <span
          class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold"
          >Wajib</span
        >
      </div>
    </section>
    <!-- <div class="text-center my-5 md:my-10 xs:hidden">
      <button
        class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        type="submit"
      >
        Daftar
      </button>
    </div> -->
  </div>
</template>
<script>
export default {
  name: 'Create_Campaign',
  data() {
    return {
      descPlacholder: '',
    }
  },
  methods: {},
}
</script>

<style scoped></style>
