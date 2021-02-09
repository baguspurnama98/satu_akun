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
      class="m-3 w-full pt-2 pb-5 px-8 border rounded-md shadow-md bg-white xs:pl-2"
    >
      <div class="mt-4 mb-1 xs:my-2">
        <h5 class="font-semibold py-3 text-xl inline xs:text-md">
          Upload Foto
        </h5>
        <span
          class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
          >Opsional</span
        >
      </div>
      <div class="mb-3">
        <p class="text-sm xs:text-xs">Format gambar .jpg .jpeg .png</p>
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
          <input type="file" />
          <!-- <div class="py-4">Tambah Foto</div> -->
        </div>
      </div>
    </section>

    <section
      class="m-3 w-full pt-2 pb-5 px-8 border rounded-md shadow-md bg-white xs:pl-2"
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
      class="m-3 w-full pt-2 pb-5 px-8 border rounded-md shadow-md bg-white xs:pl-2"
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
          <p class="text-xs pr-20">
            Masukan total slot yang Anda buka untuk campaign
          </p>
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
          <p class="text-xs pr-20">
            Anda bebas menentukan harga setiap slot yang harus dikeluarkan
            anggota campaign. Pastikan harga yang Anda tawarkan cukup masuk
            akal.
          </p>
        </div>

        <div class="sm:col-span-2">
          <div class="mt-1 relative rounded-md shadow-sm">
            <div
              class="absolute inset-y-0 left-0 pl-3 xs:pl-6 flex items-center pointer-events-none"
            >
              <span class="text-gray-500 sm:text-sm"> Rp. </span>
            </div>
            <input
              type="number"
              name="price"
              id="price"
              class="border focus:outline-none focus:ring focus:border-indigo-400 p-2 xs:ml-4 xs:text-xs block w-full pl-16 rounded-lg"
              placeholder="0"
            />
          </div>
        </div>
      </div>
    </section>

    <section
      class="m-3 w-full pt-2 pb-5 px-8 border rounded-md shadow-md bg-white xs:pl-2"
    >
      <div class="my-4 xs:my-2">
        <h5 class="font-semibold py-3 text-xl inline xs:text-md">
          Waktu Campaign
        </h5>
      </div>
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Durasi Campaign
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Wajib</span
          >
          <p class="text-xs pr-20">
            Pilih durasi/lama dari platform anda berjalan
          </p>
        </div>

        <div class="sm:col-span-2 xs:pl-4">
          <!-- Input durasi bingung bentuknya gmn-->
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-2">
        <div class="pl-8 xs:pl-4">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Batas Expired Campaign
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-sm font-semibold xs:text-xs"
            >Wajib</span
          >
          <p class="text-xs pr-20">
            Pilih lama campaign Anda aktif pada Berpatungan.com
          </p>
        </div>

        <div class="sm:col-span-2 xs:pl-4">
          <div class="grid grid-cols-3 gap-2">
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                type="radio"
                name="expired"
                class="form-radio h-5 w-5 xs:h-3 xs:w-3 text-gray-600"
              /><span class="ml-2 text-gray-700 xs:text-xs">3 Hari</span>
            </label>
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                name="expired"
                type="radio"
                class="form-radio h-5 w-5 text-gray-600 xs:h-3 xs:w-3"
              /><span class="ml-2 text-gray-700 xs:text-xs">7 Hari</span>
            </label>
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                name="expired"
                type="radio"
                class="form-radio h-5 w-5 text-gray-600 xs:h-3 xs:w-3"
              /><span class="ml-2 text-gray-700 xs:text-xs">1 Bulan</span>
            </label>
          </div>
        </div>
      </div>
    </section>

    <div class="w-full text-center my-5 md:my-10">
      <button
        class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        type="submit"
      >
        Daftar
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Create_Campaign',

  data() {},
  methods: {},
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
