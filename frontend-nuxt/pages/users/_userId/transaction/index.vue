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

      <div style="border-bottom: 2px solid #eaeaea" class="mt-10">
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
    <div v-if="transactions_done === null || transactions_onGoing === null">
      <Spinner />
    </div>
    <div v-else>
      <div v-if="menuActive == 'progress'" class="datatables-campaign">
        <InProgress :transactions="transactions_onGoing" />
      </div>
      <div v-if="menuActive == 'complete'" class="datatables-campaign">
        <Complete :transactions="transactions_done" />
      </div>
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
      transactions_onGoing: null,
      transactions_done: null,
    }
  },
  methods: {
    handleChooseCategory(menu) {
      this.menuActive = menu
    },
  },
  activated() {
      if (this.$fetchState.timestamp <= Date.now() - 30000) {
        this.$fetch()
      }
  },
  fetch() {
    this.$destroy()
    let onGoing = []
    let done = []
    this.$axios
      .$get(`transaction/user/${this.$store.state.user.id}`)
      .then((resp) => {
        for (let i = 0; i < resp.transactions.length; i++) {
          if (resp.transactions[i].status === 0) {
            onGoing.push(resp.transactions[i])
          } else {
            done.push(resp.transactions[i])
          }
        }
        this.transactions_onGoing = onGoing
        this.transactions_done = done
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
