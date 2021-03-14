<template>
  <div
    class="container mx-auto flex justify-center justify-items-start items-start absolute z-100 inset-0"
    :class="[status ? '' : 'hidden']"
  >
    <div class="fixed w-1/3 xs:w-full self-center">
      <form class="bg-white rounded-lg shadow-lg mx-auto xs:mx-8">
        <div
          class="border-t-8 border-indigo-600 rounded-lg md:px-6 sm:px-4 xs:px-5"
        >
          <div class="w-full pt-9 px-4 text-center">
            <h3
              class="font-bold text-indigo-500 pt-5 capitalize text-3xl xs:text-xl sm:text-2xl"
            >
              {{ todo }} Category
            </h3>
          </div>

          <div
            class="py-8 text-base leading-6 text-gray-700 sm:text-md sm:leading-7 xs:text-sm"
          >
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Nama Kategori</label>
              <input
                type="text"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan Kategori"
                v-model="categories.categories"
              />
            </div>
          </div>
        </div>

        <div class="p-4 flex space-x-4">
          <button
            @click.prevent="onClickCancel()"
            class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
          >
            Batal
          </button>
          <button
            class="w-1/2 px-4 py-3 text-center text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg hover:text-white font-bold text-sm focus:outline-none capitalize"
            @click.prevent="handleSave()"
          >
            <span class="inline-flex items-center p-0 m-0">
              <svg
                v-if="loading"
                class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <circle
                  class="opacity-25"
                  cx="12"
                  cy="12"
                  r="10"
                  stroke="currentColor"
                  stroke-width="4"
                ></circle>
                <path
                  class="opacity-75"
                  fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
              </svg>
              {{ todo }}</span
            >
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ManageCategory',
  props: ['status', 'todo'],
  data() {
    return {
      loading: false,
      categories: {
        categories: '',
      },
    }
  },
  methods: {
    handleSave() {
      this.loading = true
      this.$axios
        .$post(
          process.env.API_DEV_URL + `campaign/categories/store`,
          this.categories
        )
        .then((resp) => {
          console.log(resp)
          if (resp.message === 'CREATED') {
            window.location.reload('/admin/category/')
          }
        })
        .catch((errors) => {
          console.dir(errors)
        })
    },
    onClickCancel(event) {
      this.$emit('clicked')
    },
  },
}
</script>
