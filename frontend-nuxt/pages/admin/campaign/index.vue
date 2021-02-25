<template>
  <div
    class="container px-4 my-12 mx-auto flex-wrap items-center justify-between min-h-screen"
  >
    <h3 class="font-bold pb-3 text-4xl text-indigo-500 xs:text-2xl">
      Pilih status campaign
    </h3>
    <div class="grid grid-cols-4 xs:grid-cols-2 gap-8 w-full justify-center">
      <span
        @click.prevent="trailBackslash(item.route)"
        class="flex flex-col items-center justify-center bg-white p-4 shadow-md rounded-lg transform hover:scale-105 cursor-pointer text-gray-900 hover:text-black"
        v-for="item in menu"
        :key="item.name"
      >
        <div
          class="inline-flex shadow-lg border border-gray-200 overflow-hidden h-40 w-full"
        >
          <div
            width="128"
            heigth="128"
            alt=""
            class="h-full w-full bg-gray-300 border-none"
          >
            <img
              :src="require('@/assets/img/' + item.img)"
              class="h-full w-full"
              alt="..."
            />
          </div>
        </div>

        <h2 class="mt-4 font-bold text-xl">{{ item.name }}</h2>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      menu: [
        { img: 'active-icon.svg', name: 'Aktif', route: 'active/' },
        { img: 'going-icon.svg', name: 'Berlangsung', route: 'going-on/' },
        { img: 'finish-icon.svg', name: 'Selesai', route: 'finish/' },
        { img: 'refund-icon.svg', name: 'Refund', route: 'refund/' },
        { img: 'expired-icon.svg', name: 'Kadaluarsa', route: 'expired/' },
      ],
    }
  },
  methods: {
    /**
     * menghandle trailing backslash
     * pada href maupun nuxtlink ekspetasi routing bergantung pada backslash
     * localhost:8000/admin -> /user/ (tidak ada backslash di ujung admin)
     * localhost:8000/admin/ -> /admin/user/
     */
    trailBackslash: function (routeName) {
      let path = this.$route.path.endsWith('/')
        ? routeName
        : `admin/${routeName}`
      this.$router.push(path)
    },
  },
  mounted() {
    console.log(this.$route)
  },
}
</script>
