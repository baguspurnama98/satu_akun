<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div class="w-full mb-5">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">Buat Campaign</h3>
      <div class="bg-blue-100 p-3 rounded-lg xs:text-sm">
        <p>
          Pastikan campaign Anda sesuai dengan
          <b>syarat dan ketentuan Berpatungan.com</b>.
        </p>
        <p>
          Berpatungan menghimbau untuk menjalankan campaign yang wajar atau
          campaign Anda dapat diturunkan oleh Berpatungan.com sesuai S&K yang
          berlaku.
        </p>
      </div>
    </div>

    <h5
      class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md"
    >
      Informasi Campaign
    </h5>
    <section
      class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
    >
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Judul Campaign
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
            Tulis judul campaign Anda dengan singkat, padat dan jelas
          </p>
        </div>
        <div class="sm:col-span-2">
          <div>
            <input
              type="text"
              class="appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
              placeholder="Contoh: Akun Sharing Netflix 1 Bulan"
            />
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Kategori Campaign
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
            Pilih kategori campaign yang sesuai
          </p>
        </div>
        <div class="sm:col-span-2">
          <div class="group inline-block w-1/3 xs:w-full">
            <button
              class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-md flex items-center w-full"
            >
              <span
                class="pr-1 flex-1 text-gray-500 text-left"
                v-if="campaign.categories === ''"
                >Pilih Kategori</span
              >
              <span class="pr-1 flex-1 text-left" v-else>{{
                campaign.categories
              }}</span>
              <span>
                <svg
                  class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-500 ease-in-out"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                  />
                </svg>
              </span>
            </button>
            <ul
              class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32"
            >
              <li
                v-for="item in categories"
                :key="item.id"
                class="rounded-sm px-3 py-2 relative hover:bg-gray-200 cursor-pointer text-md xs:text-sm"
              >
                <button
                  class="w-full text-left flex items-center outline-none focus:outline-none"
                  v-if="item.sub"
                >
                  <span class="pr-5 flex-1"> {{ item.name }}</span>
                  <span class="mr-auto">
                    <svg
                      class="fill-current h-4 w-4 transition duration-500 ease-in-out"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </span>
                </button>
                <span v-else @click="setSelectedCategory(item.name)">{{
                  item.name
                }}</span>
                <ul
                  class="bg-white border rounded-sm absolute top-0 right-0 transition duration-300 ease-in-out origin-top-left min-w-32"
                >
                  <li
                    class="px-3 py-2 hover:bg-gray-200"
                    v-for="child in item.sub"
                    :key="child.id"
                    @click="setSelectedCategory(child.name)"
                  >
                    {{ child.name }}
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Deskripsi
          </h6>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-xs font-semibold"
            >Opsional</span
          >
          <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
            Tulis deskripsi campaign Anda sedetail mungkin
          </p>
        </div>

        <div class="sm:col-span-2">
          <div>
            <textarea
              class="w-full h-96 appearance-none border rounded py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
              placeholder=""
              rows="5"
            />
          </div>
        </div>
      </div>
    </section>

    <h5
      class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md"
    >
      Harga Campaign
    </h5>
    <section
      class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
    >
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Jumlah Slot
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">
            Masukan total slot yang Anda buka untuk campaign
          </p>
        </div>

        <div class="sm:col-span-2">
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
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Harga/slot
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">
            Anda bebas menentukan harga setiap slot yang harus dikeluarkan
            anggota campaign. Pastikan harga yang Anda tawarkan cukup masuk
            akal.
          </p>
        </div>

        <div class="sm:col-span-2">
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

    <h5
      class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md"
    >
      Waktu Campaign
    </h5>
    <section
      class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
    >
      <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
        <div class="col-span-1">
          <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
            Durasi Campaign
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs md:pr-20">
            Pilih durasi/lama dari platform anda berjalan
          </p>
        </div>

        <div class="sm:col-span-2 xs:pl-4">
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
                <option value="days">Hari</option>
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
            Expired Campaign
          </h6>
          <span
            class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
            >Wajib</span
          >
          <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
            Pilih lama campaign Anda aktif pada Berpatungan.com
          </p>
        </div>

        <div class="sm:col-span-2 xs:pl-4">
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

    <section
      class="mx-3 w-full pt-2 py-5 px-6 my-4 rounded-b-md shadow-md bg-white"
    >
      <div class="mt-4 mb-1 xs:my-2">
        <h5 class="font-semibold py-3 text-lg inline xs:text-sm">
          Upload Foto
        </h5>
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
          class="rounded w-full px-4 py-16 xs:py-8 text-center md:border-solid md:border md:border-gray-400"
        >
          <svg
            class="mx-auto h-12 w-12 text-gray-500 m-3"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 48 48"
            aria-hidden="true"
          >
            <path
              d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <input type="file" class="text-sm border rounded w-full p-3" />
          <!-- <div class="py-4">Tambah Foto</div> -->
        </div>
      </div>
    </section>
    <label class="flex items-center pl-3 py-3 xs:pl-0">
      <input
        type="checkbox"
        name="expired"
        class="form-tick h-6 w-6 xs:h-5 xs:w-5 focus:outline-none text-gray-600"
        v-model="terms"
      />
      <span class="ml-3 xs:ml-2 text-gray-700 xs:text-sm"
        >Kamu menyetujui
        <a href="" class="text-red-500">Syarat dan Ketentuan</a> yang berlaku
        pada layanan ini</span
      >
    </label>

    <div class="w-full text-center my-5 md:my-10">
      <button
        class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        type="submit"
        v-bind:class="[isDisabled ? 'opacity-50' : '']"
        :disabled="isDisabled"
      >
        Daftar
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Create_Campaign',
  data() {
    return {
      terms: false,
      campaign: {
        title: '',
        categories: '',
        description: '',
        slot: '',
        price: '',
        duration: '',
        expired: '',
        img: '',
      },
      categories: [
        {
          name: 'Entertaintment ',
          sub: [
            {
              name: 'Netflix',
            },
            {
              name: 'Spotify',
            },
            {
              name: 'Youtube Premium',
            },
            {
              name: 'Joox',
            },
            {
              name: 'VIU',
            },
          ],
        },
        {
          name: 'Edukasi',
          sub: [
            {
              name: 'Datacamp',
            },
            {
              name: 'Dicoding',
            },
            {
              name: 'Kahn Academy',
            },
            {
              name: 'Ruang Guru',
            },
            {
              name: 'Code Politan',
            },
            {
              name: 'Udemy',
            },
          ],
        },
        { name: 'Hobi', sub: [{ name: 'Gaming' }, { name: 'Memasak' }] },
        { name: 'Lain-lain' },
      ],
    }
  },
  computed: {
    isDisabled: function () {
      return !this.terms
    },
  },
  methods: {
    setSelectedCategory(item) {
      this.campaign.categories = item
    },
  },

  async mounted() {
    await this.$axios
      .$get(process.env.API_DEV_URL + 'campaign/categories')
      .then((resp) => {
        const { categories } = resp
        this.categories = categories
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}

li > ul {
  transform: translatex(100%) scale(0);
}
li:hover > ul {
  transform: translatex(101%) scale(1);
}
li > button svg {
  transform: rotate(-90deg);
}
li:hover > button svg {
  transform: rotate(-270deg);
}
.group:hover .group-hover\:scale-100 {
  transform: scale(1);
}
.group:hover .group-hover\:-rotate-180 {
  transform: rotate(180deg);
}
.scale-0 {
  transform: scale(0);
}
.min-w-32 {
  min-width: 8rem;
}
</style>
