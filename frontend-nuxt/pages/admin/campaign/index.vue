<template>
  <div
    class="container px-4 mx-auto flex-wrap items-center justify-between min-h-screen"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>

    <!-- <div class="grid grid-cols-5 xs:grid-cols-2 gap-8 w-full justify-center">
      <span
        @click.prevent="trailBackslash(item.route)"
        class="flex flex-col items-center justify-center bg-white p-3 shadow-md rounded-lg transform hover:scale-105 cursor-pointer text-gray-900 hover:text-black"
        v-for="item in menu"
        :key="item.name"
      >
        <div
          class="flex items-center shadow-lg border border-gray-200 overflow-hidden h-20 w-full text-center justify-center"
        >
          <div
            width="128"
            heigth="128"
            alt=""
            class="h-full w-full bg-gray-300 border-none relative items-center"
          >
            <img
              :src="require('@/assets/img/' + item.img)"
              class="h-full w-full rounded-md opacity-25 bg-white"
              alt="..."
            />
          </div>
          <h2 class="font-bold text-lg absolute text-black">
            {{ item.name }}
          </h2>
        </div>
      </span>
    </div> -->
    <div class="container mx-auto px-6 pt-3 pb-10">
      <div class="flex items-center justify-between">
        <div class="w-full text-center">
          <h3 class="font-bold pb-3 text-4xl text-indigo-500 xs:text-2xl">
            Pilih status campaign
          </h3>
        </div>
      </div>
      <nav class="flex justify-center items-center mt-4">
        <div class="flex flex-row mt-3 flex-wrap text-center">
          <a
            class="text-gray-600 hover:underline mx-auto px-2 sm:mt-0 cursor-pointer"
            @click="handleChooseCategory(item.route)"
            v-for="item in menu"
            :key="item.name"
            :class="[
              menuActive == item.route ? 'text-indigo-400 font-bold' : '',
            ]"
            >{{ item.name }}</a
          >
        </div>
      </nav>
    </div>
    <div v-if="menuActive == 'active'" class="px-3 overflow-auto">
      <CampaignActiveTable />
    </div>
    <div v-if="menuActive == 'going-on'" class="px-3 overflow-auto">
      <CampaignGoingOnTable />
    </div>
    <div v-if="menuActive == 'finish'" class="px-3 overflow-auto">
      <CampaignFinishTable />
    </div>
    <div v-if="menuActive == 'refund'" class="px-3 overflow-auto">
      <CampaingRefundTable />
    </div>
    <div v-if="menuActive == 'expired'" class="px-3 overflow-auto">
      <CampaignExpiredTable />
    </div>
  </div>
</template>

<script>
import CampaignActiveTable from '@/components/DataTables/Campaign/CampaignActiveTable'
import CampaignGoingOnTable from '@/components/DataTables/Campaign/CampaignGoingOnTable'
import CampaignFinishTable from '@/components/DataTables/Campaign/CampaignFinishTable'
import CampaingRefundTable from '@/components/DataTables/Campaign/CampaingRefundTable'
import CampaignExpiredTable from '@/components/DataTables/Campaign/CampaignExpiredTable'

export default {
  components: {
    CampaignActiveTable,
    CampaignGoingOnTable,
    CampaignFinishTable,
    CampaingRefundTable,
    CampaignExpiredTable,
  },
  data() {
    return {
      menuActive: 'active',
      menu: [
        { img: 'active-icon.svg', name: 'Aktif', route: 'active' },
        { img: 'going-icon.svg', name: 'Berlangsung', route: 'going-on' },
        { img: 'finish-icon.svg', name: 'Selesai', route: 'finish' },
        { img: 'refund-icon.svg', name: 'Refund', route: 'refund' },
        { img: 'expired-icon.svg', name: 'Kadaluarsa', route: 'expired' },
      ],
      breadcrumbs: [],
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
    handleChooseCategory(menu) {
      this.menuActive = menu
    },
  },
  mounted() {
    const fullPath = this.$route.fullPath
    const params = fullPath.substring(1).split('/')

    let path = ''
    let crumbs = []

    params.forEach((param, index) => {
      path = `${path}/${param}`
      const match = this.$router.match(path)

      //   Jika name route tidak null dan name route belum ada di crumbs
      if (
        match.name !== null &&
        crumbs.map((val) => val.name).indexOf(match.name) === -1
      ) {
        crumbs.push(match)
      }
    })
    this.breadcrumbs = crumbs
  },
}
</script>
