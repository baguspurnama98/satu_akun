<template>
  <div>
    <div
      class="min-w-screen min-h-screen flex -mt-20 justify-between items-center"
      v-if="campaign === null || transactions === null"
    >
      <svg
        class="animate-spin mx-auto place-items-center h-20 w-20 text-indigo-400 self-center"
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
    </div>
    <div v-else>
      <CampaignDashboard :campaign="campaign" />
      <!-- Content ini bakal ada untuk semua tipe pengguna, in atau out -->
      <!-- Kalau in, kita yg bayar ke host, kalau out mereka yang bayar ke kita -->
      <div class="container mx-auto flex items-center mt-6">
        <div class="lg:w-3/5 w-full px-4 my-4 mx-auto overflow-auto">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Riwayat Transaksi
          </h3>
          <p class="mt-1 mb-5 max-w-2xl text-sm text-gray-600">
            Detail personal campaign yang dapat digunakan.
          </p>
          <div
            class="flex border-t border-gray-200 py-2"
            v-for="transaction in transactions"
            :key="transaction.id"
          >
            <span class="text-gray-600 pr-6">{{
              transaction.type === '1' ? 'IN' : 'OUT'
            }}</span>
            <span class="text-gray-600">{{
              transaction.created_at | formatDate
            }}</span>
            <span class="ml-auto text-gray-900">{{
              transaction.nominal | formatRupiah
            }}</span>
            <span class="ml-auto text-gray-900">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                class="h-6 w-6 text-indigo-500"
                viewBox="0 0 24 24"
                stroke="currentColor"
                v-if="transaction.status === 0"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-red-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                v-else
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CampaignDashboard from '@/components/Campaign/Dashboard/Campaign'

export default {
  components: { CampaignDashboard },
  layout: 'default',
  data() {
    return {
      campaign: null,
      transactions: null,
    }
  },
  beforeMount() {
    this.$axios
      .$get(
        process.env.API_DEV_URL + `campaign/${this.$route.params.idCampaign}`
      )
      .then((resp) => {
        this.campaign = resp.campaigns
      })
      .catch((errors) => {
        if (errors.response.status === 404) {
          console.log('oke')
          return this.$nuxt.error({
            statusCode: 404,
            message: 'Post not found',
          })
        }
      })

    this.$axios
      .$get(
        process.env.API_DEV_URL +
          `transaction/user/${this.$route.params.userId}/campaign/${this.$route.params.idCampaign}`
      )
      .then((resp) => {
        console.log(resp)
        this.transactions = resp.transactions
        // console.log(this.campaign)
      })
      .catch((errors) => {
        if (errors.response.status === 404) {
          console.log('oke')
          return this.$nuxt.error({
            statusCode: 404,
            message: 'Post not found',
          })
        }
      })
  },
}
</script>
