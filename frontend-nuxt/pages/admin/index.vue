<
<template>
  <div
    class="container px-4 my-12 mx-auto flex flex-wrap items-center justify-between"
  >
    <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 w-full">
      <span
        @click.prevent="trailBackslash(item.route)"
        class="flex flex-col items-center justify-center bg-white p-4 shadow-md rounded-lg hover:bg-yellow-300 cursor-pointer"
        v-for="item in menu"
        :key="item.name"
      >
        <div
          class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40"
        >
          <div
            width="128"
            heigth="128"
            alt=""
            class="h-full w-full bg-gray-300 border-none"
          ></div>
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
        { name: 'User', route: 'user/' },
        { name: 'Campaign', route: 'campaign/' },
        { name: 'Payment', route: 'payment/' },
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
      trailBackslash: function(routeName) {
        let path = this.$route.path.endsWith('/') ? routeName : `admin/${routeName}`
        this.$router.push(path)
      },
  },
  mounted() {
      console.log(this.$route)
  }
}
</script>
