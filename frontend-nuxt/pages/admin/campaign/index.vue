<template>
  <div
    class="container px-4 mx-auto flex-wrap items-center justify-between min-h-screen"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <div class="container mx-auto px-6 pt-3 pb-10">
      <div class="flex items-center justify-between">
        <div class="w-full text-center">
          <h3 class="font-bold pb-3 text-4xl text-indigo-500 xs:text-2xl">
            Pilih Status Campaign
          </h3>
        </div>
      </div>
      <nav class="flex justify-center items-center mt-4">
        <div class="flex flex-row mt-3 flex-wrap text-center">
          <a
            class="text-gray-600 hover:underline mx-auto px-2 sm:mt-0 cursor-pointer"
            @click="handleChooseCategory(item.id, item.route)"
            v-for="item in menu"
            :key="item.id"
            :class="[
              menuActive == item.route ? 'text-indigo-400 font-bold' : '',
            ]"
            >{{ item.name }}</a
          >
        </div>
      </nav>
    </div>
    <div v-if="menuActive == 'active'" class="datatables-campaign">
      <CampaignActiveTable />
    </div>
    <div v-if="menuActive == 'going-on'" class="datatables-campaign">
      <CampaignOnGoingTable />
    </div>
    <div v-if="menuActive == 'finish'" class="datatables-campaign">
      <CampaignFinishTable />
    </div>
    <div v-if="menuActive == 'refund'" class="datatables-campaign">
      <CampaingRefundTable />
    </div>
    <div v-if="menuActive == 'refunded'" class="datatables-campaign">
      <CampaingRefundedTable />
    </div>
    <div v-if="menuActive == 'expired'" class="datatables-campaign">
      <CampaignExpiredTable />
    </div>
  </div>
</template>

<script>
import CampaignActiveTable from '@/components/DataTables/Campaign/CampaignActiveTable'
import CampaignOnGoingTable from '@/components/DataTables/Campaign/CampaignOnGoingTable'
import CampaignFinishTable from '@/components/DataTables/Campaign/CampaignFinishTable'
import CampaingRefundTable from '@/components/DataTables/Campaign/CampaingRefundTable'
import CampaingRefundedTable from '@/components/DataTables/Campaign/CampaingRefundedTable'
import CampaignExpiredTable from '@/components/DataTables/Campaign/CampaignExpiredTable'

export default {
  components: {
    CampaignActiveTable,
    CampaignOnGoingTable,
    CampaignFinishTable,
    CampaingRefundTable,
    CampaignExpiredTable,
  },
  data() {
    return {
      menuActive: 'active',
      idMenu: '0',
      menu: [
        { name: 'Aktif', route: 'active', id: '0' },
        { name: 'Berlangsung', route: 'going-on', id: '1' },
        { name: 'Selesai', route: 'finish', id: '5' },
        { name: 'Refund', route: 'refund', id: '3' },
        { name: 'Selesai Refund', route: 'refunded', id: '4' },
        { name: 'Expired', route: 'expired', id: '2' },
      ],
      breadcrumbs: [],
      campaigns: [],
    }
  },
  methods: {
    /**
     * menghandle trailing backslash
     * pada href maupun nuxtlink ekspetasi routing bergantung pada backslash
     * localhost:8000/admin -> /user/ (tidak ada backslash di ujung admin)
     * localhost:8000/admin/ -> /admin/user/
     * filter berdasarkan status, 0 = aktif, 1 = berlangsung, 2 = expired, 3 = refund, 4 = selesai refund, 5 = selesai
     */
    trailBackslash: function (routeName) {
      let path = this.$route.path.endsWith('/')
        ? routeName
        : `admin/${routeName}`
      this.$router.push(path)
    },
    handleChooseCategory(id, menu) {
      this.campaigns = []
      this.menuActive = menu
      this.idMenu = id
      // switch (this.idMenu) {
      //   case '0':
      //     this.fetchData('0')
      //     break
      //   case '1':
      //     this.fetchData('1')
      //     break
      //   case '2':
      //     this.fetchData('2')
      //     break
      //   case '3':
      //     this.fetchData('3')
      //     break
      //   case '4':
      //     this.fetchData('4')
      //     break
      //   case '5':
      //     this.fetchData('5')
      //     break
      // }
    },
    // fetchData() {
    //   this.$axios
    //     .$get(`campaign?status=${this.idMenu}`)
    //     .then((resp) => {
    //       this.campaigns = resp.campaigns
    //       console.log(this.campaigns)
    //     })
    //     .catch((errors) => {
    //       console.log(errors)
    //     })
    // },
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
  // fetch() {
  //   this.fetchData()
  // },
}
</script>
<style lang="postcss">
.datatables-campaign {
  @apply px-3 overflow-auto h-screen;
}
</style>
