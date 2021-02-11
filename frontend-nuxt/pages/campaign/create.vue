<template>
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">Buat Campaign</h3>
      <div class="bg-blue-100 p-3 rounded-lg xs:text-sm">
        <p>
          Pastikan campaign Anda sesuai dengan
          <b>syarat dan ketentuan Berpatungan.com</b>.
        </p>
        <p>
          Berpatungan menghimbau untuk menjalankan campaign yang wajar atau campaign Anda
          dapat diturunkan oleh Berpatungan.com sesuai S&K yang berlaku.
        </p>
      </div>
    </div>

    <section
      class="mx-3 mb-10 w-full pt-2 py-5 px-6 my-4 rounded-b-md shadow-md bg-white"
    >
      <div class="mt-4 mb-1 xs:my-2">
        <h5 class="font-semibold py-3 text-lg inline xs:text-sm">Upload Foto</h5>
        <span
          class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-xs font-semibold"
          >Opsional</span
        >
      </div>
      <div class="mb-3">
        <p class="text-sm">Format gambar .jpg .jpeg .png</p>
      </div>
      <div class="pb-5 flex flex-wrap items-center justify-between">
        <div
          id="empty-cover-art"
          class="rounded w-full py-16 xs:py-8 text-center opacity-50 md:border-solid md:border md:border-gray-400"
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
          <input type="file" class="text-sm border rounded w-full py-3 px-3" />
          <!-- <div class="py-4">Tambah Foto</div> -->
        </div>
      </div>
    </section>

    <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
      Informasi Campaign
    </h5>
    <section class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white">
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Judul Campaign</h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20 xs:pr-0">
            Tulis judul campaign Anda dengan singkat, padat dan jelas
          </p>
        </div>
        <div class="md:col-span-2">
          <div>
            <input
              type="text"
              class="w-full appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
              placeholder="Contoh: Akun Sharing Netflix 1 Bulan"
            />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Deskripsi</h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-xs font-semibold"
            >Opsional</span
          >
          <p class="text-xs md:pr-20 xs:pr-0">
            Tulis deskripsi campaign Anda sedetail mungkin
          </p>
        </div>

        <div class="md:col-span-2">
          <div>
            <textarea
              class="w-full h-96 appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
              placeholder=""
              rows="5"
            />
          </div>
        </div>
      </div>
    </section>

    <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
      Harga Campaign
    </h5>
    <section class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white">
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Jumlah Slot</h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">Masukan total slot yang Anda buka untuk campaign</p>
        </div>

        <div class="md:col-span-2">
          <div>
            <input
              type="number"
              min="2"
              max="20"
              class="w-full border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded xs:text-sm"
              placeholder="Contoh: 2"
            />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Harga/slot</h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">
            Anda bebas menentukan harga setiap slot yang harus dikeluarkan anggota
            campaign. Pastikan harga yang Anda tawarkan cukup masuk akal.
          </p>
        </div>

        <div class="md:col-span-2">
          <div class="mt-1 relative rounded-md shadow-sm">
            <div
              class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
            >
              <span class="text-gray-800 text-sm">Rp</span>
            </div>
            <input
              type="number"
              name="price"
              id="price"
              class="border focus:outline-none focus:ring focus:border-indigo-400 p-2 xs:text-sm block w-full pl-10 rounded"
              placeholder="0"
            />
          </div>
        </div>
      </div>
    </section>

    <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
      Waktu Campaign
    </h5>
    <section class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white">
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Durasi Campaign</h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">Pilih durasi/lama dari platform anda berjalan</p>
        </div>

        <div class="md:col-span-2 xs:pl-4">
          <div class="grid grid-cols-3 gap-2">
            <label class="inline-flex items-center py-2 xs:py-0">
              <!-- Harus ada pengecekan, jika bulan yg dipilih, maka max nya 12, jika hari maka maks nya 31 -->
              <input
                type="number"
                min="1"
                max="12"
                class="w-full border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded xs:text-sm"
                placeholder="Contoh: 2"
              />
            </label>
            <label class="inline-flex items-center py-2 xs:py-0">
              <select
                class="w-full border focus:outline-none focus:ring focus:border-indigo-400 py-2 rounded xs:text-sm"
                name="range_period"
                id="range_period"
              >
                <option value="months">Bulan</option>
                <option value="years">Tahun</option>
              </select>
            </label>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Batas Expired Campaign
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">
            Pilih lama campaign Anda aktif pada Berpatungan.com
          </p>
        </div>

        <div class="md:col-span-2 xs:pl-4">
          <div class="grid grid-cols-3 gap-2">
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                type="radio"
                name="expired"
                class="form-radio h-4 w-4 xs:h-3 xs:w-3 text-gray-600"
              /><span class="ml-2 text-gray-700 xs:text-sm">1 Hari</span>
            </label>
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                name="expired"
                type="radio"
                class="form-radio h-4 w-4 text-gray-600 xs:h-3 xs:w-3"
              /><span class="ml-2 text-gray-700 xs:text-sm">3 Hari</span>
            </label>
            <label class="inline-flex items-center py-2 xs:py-0">
              <input
                name="expired"
                type="radio"
                class="form-radio h-4 w-4 text-gray-600 xs:h-3 xs:w-3"
              /><span class="ml-2 text-gray-700 xs:text-sm">7 Hari</span>
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
  name: "Create_Campaign",

  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
