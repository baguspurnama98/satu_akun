<template>
  <div
    class="container mx-auto flex justify-center justify-items-start items-start absolute z-100 inset-0"
    :class="[status ? '' : 'hidden']"
  >
    <div class="fixed w-1/2 sm:w-2/3 xs:w-full self-center">
      <form class="bg-white rounded-lg shadow-lg mx-auto xs:mx-8">
        <div class="border-t-8 border-indigo-600 rounded-lg px-10 xs:px-5">
          <div class="w-full pt-9 px-4 text-center">
            <h3
              class="font-bold text-indigo-500 pt-5 capitalize text-3xl xs:text-xl sm:text-2xl"
            >
              Form Informasi Akun
            </h3>
          </div>

          <div
            class="py-8 text-base leading-6 text-gray-700 sm:text-md sm:leading-7 xs:text-sm"
          >
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Email</label>
              <!-- <input
                  type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Pilih Email"
                /> -->
              <select
                class="w-full border focus:outline-none focus:ring focus:border-indigo-400 px-4 py-2 rounded-md sm:text-sm"
                name="range_period"
                id="range_period"
              >
                <option>Pilih...</option>
                <option value="akun-1-@patungin.com">
                  akun-1-@patungin.com
                </option>
                <option value="akun-2-@patungin.com">
                  akun-2-@patungin.com
                </option>
                <option value="akun-3-@patungin.com">
                  akun-3-@patungin.com
                </option>
              </select>
            </div>
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Password</label>
              <input
                type="text"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan Password"
              />
            </div>
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Deskripsi</label>
              <textarea
                rows="6"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan Deskripsi Tambahan"
              />
            </div>
            <div class="flex flex-col mb-1">
              <label class="leading-loose text-md">Link Grup WA</label>
              <input
                type="textarea"
                row="5"
                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Masukan url link"
              />
            </div>
          </div>
        </div>

        <div class="p-4 flex space-x-4">
          <button
            class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
          >
            Batal
          </button>
          <button
            class="w-1/2 px-4 py-3 text-center text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg hover:text-white font-bold text-sm focus:outline-none"
          >
            Proses
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props: ['status'],
}
</script>
