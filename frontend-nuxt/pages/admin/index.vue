<
<template>
  <div
    class="container px-4 my-12 mx-auto flex flex-wrap items-center justify-between"
  >
    <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 w-full">
      <a
        class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg hover:bg-indigo-300 cursor-pointer"
        v-for="item in menu"
        :key="item.name"
        v-bind:href="item.route"
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
      </a>
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
}
</script>
