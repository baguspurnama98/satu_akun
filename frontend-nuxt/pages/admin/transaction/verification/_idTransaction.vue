<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-start justify-between"
  >
    <div class="w-full">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">
        Verifikasi Pembayaran
      </h3>
      <div v-if="transaction === null">
        <Spinner />
      </div>

      <div
        class="border rounded-lg grid grid-cols-2 gap-1 m-2 lg:mx-56 py-3 xs:text-sm bg-indigo-100"
        v-else
      >
        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">No. Transaksi</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span> {{ transaction.no_transaction }} </span>
        </div>
        <!--  -->
        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">Nama</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span> {{ transaction.users.name }} </span>
        </div>
        <!--  -->
        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">Judul Campaign</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span> {{ transaction.campaigns.title }}</span>
        </div>
        <!--  -->
        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">Nominal</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span>{{ transaction.nominal | formatRupiah }}</span>
        </div>

        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">Total Biaya</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span>{{ transaction.total_nominal | formatRupiah }} </span>
        </div>

        <div class="pl-5 xs:pl-2 flex justify-between">
          <span class="font-medium">Status</span>
          <span class="mr-5 xs:mr-1">:</span>
        </div>
        <div>
          <span
            aria-hidden
            class="bg-indigo-500 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
            v-if="transaction.status === 0"
            >Belum Dikonfirmasi</span
          >
          <span
            v-if="transaction.status === 1"
            aria-hidden
            class="bg-yellow-500 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
            >Terkonfirmasi
          </span>
          <span
            v-if="transaction.status === 2"
            aria-hidden
            class="bg-red-500 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
            >Gagal
          </span>
        </div>
      </div>
      <div class="w-full text-center my-3 md:my-5">
        <button
          class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
          @click.prevent="verif"
        >
          <span class="inline-flex items-center p-0 m-0">
            <svg
              v-if="loading"
              class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
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

            Konfirmasi</span
          >
        </button>
      </div>

      <!-- <div class="w-full text-center my-3 md:my-5" v-else>
        <button
          class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        >
          Sudah Dikonfirmasi
        </button>
      </div> -->
    </div>
  </div>
</template>
<script>
import Spinner from '@/components/Spinner.vue'

export default {
  components: { Spinner },
  name: 'VerifTransaction',

  data() {
    return {
      transaction: null,
      loading: false,
    }
  },
  methods: {
    verif() {
      this.loading = true
      this.$axios
        .$get(`transaction/verify/${this.$route.params.idTransaction}`)
        .then((resp) => {
          console.log(resp)
          //    if (resp.message === 'CREATED') {
          //             this.$router.push(
          //               `/campaign/${resp.campaign.id}/${resp.campaign.slug}`
          //             )
          //           }
        })
        .catch((errors) => {
          if (errors.response.status === 404) {
            return this.$nuxt.error({
              statusCode: 404,
              message: 'Post not found',
            })
          }
        })
    },
  },
  async created() {
    await this.$axios
      .$get(`transaction/${this.$route.params.idTransaction}`)
      .then((resp) => {
        this.transaction = resp.transaction
        console.log(resp)
      })
      .catch((errors) => {
        if (errors.response.status === 404) {
          return this.$nuxt.error({
            statusCode: 404,
            message: 'Post not found',
          })
        }
      })
  },
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
