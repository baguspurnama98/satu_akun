<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <div v-if="campaigns === undefined">
      <Spinner />
    </div>
    <div v-else>
      <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
        Data Payment Per Anggota
      </h3>
      <div v-if="campaigns === null" class="w-full text-center">
        <h1
          class="font-bold py-10 text-4xl xs:text-2xl text-red-500 mx-auto inline-flex"
        >
          Data Kosong!
        </h1>
      </div>
      <div v-else class="w-3/4 px-5 mx-auto xs:w-full xs:px-2">
        <div class="p-5 shadow-lg rounded-lg">
          <div class="flex justify-between">
            <div class="font-bold text-2xl xs:text-lg text-indigo-500">
              {{ campaigns[0].host_name.name }}
            </div>
            <div class="font-bold text-2xl xs:text-lg text-indigo-500">
              Host
            </div>
          </div>
          <a
            class="ml-2 px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-sm"
            :href="'https://wa.me/62' + campaigns[0].host_name.whatsapp"
            target="_blank"
          >
            WhatsApp</a
          >
        </div>

        <div v-for="member in campaigns[0].campaign_members" :key="member.id">
          <div class="p-5 shadow-lg rounded-lg my-5">
            <div class="font-bold text-2xl xs:text-lg py-4 text-indigo-500">
              {{ member.user_id }}
            </div>
            <div
              v-if="member.transactions.length == 0"
              class="italic text-gray-600 text-center"
            >
              Tidak ditemukan transaksi
            </div>
            <div
              v-else
              v-for="transaction in member.transactions"
              :key="transaction.id"
            >
              <div
                class="border-t border-gray-200 py-2 grid grid-flow-col grid-cols-4 gap-2"
              >
                <span class="font-bold" v-if="transaction.type == '1'">IN</span>
                <span class="font-bold" v-if="transaction.type == '2'"
                  >OUT</span
                >
                <span class="xs:text-sm">{{
                  transaction.timeout | formatDate
                }}</span>
                <span class="text-gray-900 xs:text-sm">{{
                  transaction.bank
                }}</span>
                <span class="text-gray-900 xs:text-sm">{{
                  transaction.total_nominal | formatRupiah
                }}</span>

                <!-- <div class="ml-auto">
                  <span
                    v-if="transaction.status == 1"
                    class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-sm"
                  >
                    Sukses
                  </span>
                  <a
                    v-else
                    class="px-2 py-1 text-white bg-red-600 hover:bg-red-700 focus:outline-none rounded-lg mr-2 shadow-md text-sm"
                    :href="`/admin/transaction/verification/${transaction.id}`"
                    target="_blank"
                  >
                    Konfirmasi
                  </a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Breadcrumb from '@/components/Breadcrumb'
export default {
  components: { Breadcrumb },
  layout: 'default',
  data() {
    return {
      campaigns: undefined,
      breadcrumbs: [],
    }
  },
  mounted() {
    const fullPath = this.$route.fullPath
    const params = fullPath.substring(1).split('/')

    let path = ''
    let crumbs = []

    params.forEach((param, index) => {
      path = `${path}/${param}`
      const match = this.$router.match(path)

      if (
        match.name !== null &&
        crumbs.map((val) => val.name).indexOf(match.name) === -1
      ) {
        crumbs.push(match)
      }
    })
    this.breadcrumbs = crumbs

    this.$nextTick(() => {
      this.$nuxt.$loading.start()
    })

    this.$axios
      .$get(`transaction/campaign/${this.$route.params.index}`)
      .then((resp) => {
        console.log(resp)
        this.campaigns = resp.campaigns
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>
