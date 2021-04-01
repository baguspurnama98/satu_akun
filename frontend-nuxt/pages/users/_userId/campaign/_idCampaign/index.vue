<template>
  <div>
    <div v-if="campaign === null || transactions === null">
      <Spinner />
    </div>
    <div v-else>
      <CampaignDashboard
        :campaign="campaign"
        v-if="campaign !== null && transactions !== null"
      />

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
import Spinner from '@/components/Spinner.vue'
export default {
  components: { CampaignDashboard },
  layout: 'default',
  data() {
    return {
      campaign: null,
      transactions: null,
    }
  },
  mounted() {
    this.$axios
      .$get(`campaign/${this.$route.params.idCampaign}`)
      .then((resp) => {
        this.campaign = resp.campaigns
        console.log(this.campaigns)
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
        `transaction/user/${this.$route.params.userId}/campaign/${this.$route.params.idCampaign}`
      )
      .then((resp) => {
        console.log(resp)
        this.transactions = resp.transactions
        console.log(this.campaign)
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
