<template>
  <!-- Modal Form informasi akun -->
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
              Form {{ todo }} Email
            </h3>
          </div>

          <div
            class="py-8 text-base leading-6 text-gray-700 sm:text-md sm:leading-7 xs:text-sm"
          >
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Email</label>
              <input
                type="text"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan Email"
                :value="selected_data.email"
              />
            </div>
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Password</label>
              <input
                type="text"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan Password"
                :value="selected_data.pass"
              />
            </div>
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Status Email</label>
              <div class="inline-flex text-sm">
                <label class="inline-flex items-center mr-4">
                  <input
                    type="radio"
                    class="form-radio h-4 w-4 text-gray-600"
                    name="statusEmail"
                    :checked="selected_data.status == 1"
                  /><span class="ml-1 text-gray-700">Aktif</span>
                </label>
                <label class="inline-flex items-center">
                  <input
                    type="radio"
                    class="form-radio h-4 w-4 text-gray-600"
                    name="statusEmail"
                    :checked="selected_data.status == 0"
                  /><span class="ml-1 text-gray-700">Non-Aktif</span>
                </label>
              </div>
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
            @click.prevent="handleSaveEmail()"
          >
            {{ todo }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ManageEmail',
  props: ['status', 'todo', 'selected'],
  data() {
    return {
      selected_data: {
        email: this.selected.email,
        pass: this.selected.pass,
        status: this.selected.status,
      },
    }
  },
  methods: {
    handleSaveEmail() {
      alert('save/edit email')
    },
    onClickCancel(event) {
      this.$emit('clicked')
    },
  },
  // mounted() {
  //   this.$nextTick(() => {
  //     console.log(this.todo)
  //     if (this.todo === 'add') {
  //       alert('add')
  //     }
  //   })
  // },
}
</script>
