<template>
  <div
    class="container px-4 mx-auto flex-wrap items-center justify-between min-h-screen"
  >
    <div class="container mx-auto px-6 pt-3 pb-10">
      <div class="flex items-center justify-between">
        <div class="w-full">
          <h3 class="font-bold pb-3 text-4xl text-indigo-500 xs:text-2xl">
            Riwayat Transaksi
          </h3>
        </div>
      </div>

      <div style="border-bottom: 2px solid #eaeaea">
        <ul class="flex cursor-pointer xs:text-sm">
          <li
            class="py-2 px-6 rounded-t-lg"
            @click="handleChooseCategory('progress')"
            :class="[menuActive == 'progress' ? 'turnOnTab' : 'turnOffTab']"
          >
            Sedang Proses
          </li>
          <li
            class="py-2 px-6 rounded-t-lg"
            @click="handleChooseCategory('complete')"
            :class="[menuActive == 'complete' ? 'turnOnTab' : 'turnOffTab']"
          >
            Selesai
          </li>
        </ul>
      </div>
    </div>
    <div v-if="menuActive == 'progress'" class="datatables-campaign">
      <InProgress :transactions="transactions" />
    </div>
    <div v-if="menuActive == 'complete'" class="datatables-campaign">
      <Complete :transactions="transactions" />
    </div>
  </div>
</template>

<script>
import Complete from '@/components/Transaction/Complete'
import InProgress from '@/components/Transaction/InProgress'

export default {
  components: {
    Complete,
    InProgress,
  },
  data() {
    return {
      menuActive: 'progress',
      breadcrumbs: [],
      transactions: [
        { name: 'Netflix 1 bulan', date: new Date(), price: 5000, status: 0 },
      ],
    }
  },
  methods: {
    handleChooseCategory(menu) {
      this.menuActive = menu
    },
  },
  //   mounted() {
  //     const fullPath = this.$route.fullPath
  //     const params = fullPath.substring(1).split('/')

  //     let path = ''
  //     let crumbs = []

  //     params.forEach((param, index) => {
  //       path = `${path}/${param}`
  //       const match = this.$router.match(path)

  //       //   Jika name route tidak null dan name route belum ada di crumbs
  //       if (
  //         match.name !== null &&
  //         crumbs.map((val) => val.name).indexOf(match.name) === -1
  //       ) {
  //         crumbs.push(match)
  //       }
  //     })
  //     this.breadcrumbs = crumbs
  //   },
}
</script>
<style lang="postcss">
.datatables-campaign {
  @apply px-3 overflow-auto h-screen;
}
.turnOnTab {
  @apply text-indigo-400 font-bold shadow-md bg-gray-100;
}

.turnOffTab {
  @apply bg-gray-200 text-gray-500;
}
</style>
