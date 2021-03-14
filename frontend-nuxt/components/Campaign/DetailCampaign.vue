<template>
  <div>
    <div
      class="min-w-screen min-h-screen flex -mt-20 justify-between items-center"
      v-if="campaign.title === undefined"
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

    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
      v-else
    >
      <div
        class="z-0 relative grid grid-cols-1 col-span-2 w-full sm:grid-cols-2 sm:px-5 sm:py-5 sm:gap-x-8 md:py-5"
      >
        <div
          class="z-10 col-start-2 xs:col-start-1 row-start-1 px-4 sm:pt-5 pt-40 bg-gradient-to-t from-black sm:bg-none"
        >
          <h2
            class="text-xl font-semibold text-white sm:text-2xl leading-tight sm:text-black md:text-3xl my-5 xs:max-w-xs"
          >
            {{ campaign.title }}
          </h2>
        </div>

        <div
          class="col-start-2 xs:col-start-1 row-start-3 space-y-3 px-4 xs:py-4"
        >
          <div
            class="flex items-center text-black text-md xs:text-sm font-normal"
          >
            <p class="font-bold text-2xl">
              {{ campaign.slot_price | formatRupiah }}
              <span class="font-normal">/orang</span>
            </p>
          </div>
          <div class="flex-1 inline-flex items-center mt-1">
            <svg
              class="h-5 w-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <p class="text-md sm:text-sm ml-1">
              <span class="text-gray-900 font-medium">{{
                campaign.durasi
              }}</span>
            </p>
          </div>
          <p class="text-sm">
            Berakhir
            <span class="font-bold text-red-700">{{
              campaign.expired_date | formatDate
            }}</span>
          </p>
          <p
            class="flex items-center text-black text-md xs:text-sm font-normal"
          >
            Oleh:
            <a
              class="text-md xs:text-sm px-1 font-medium text-indigo-500"
              href="#"
            >
              {{ campaign.host_name }}
            </a>
          </p>

          <icon-social></icon-social>
        </div>
        <div
          class="col-start-1 col-span-2 row-start-1 flex sm:col-span-1 sm:col-start-1 sm:row-span-3"
        >
          <div class="w-full grid">
            <div class="relative col-span-1 row-span-1 md:col-span-2">
              <!-- src="https://picsum.photos/640/400/?random" -->
              <img
                :src="campaign.media_url"
                alt="..."
                class="absolute inset-0 w-full h-full object-cover bg-gray-100 rounded-lg z-0"
              />
            </div>
          </div>
        </div>
      </div>

      <div
        class="w-full border border-gray-300 border-opacity-50 mt-5 sm:mx-5"
      ></div>
      <div
        class="relative grid grid-cols-1 w-full sm:px-5 sm:py-5 sm:gap-x-8 md:py-5"
      >
        <div class="px-3 my-5">
          <h1
            class="font-semibold text-2xl text-gray-700 subpixel-antialiased text-center pb-4"
          >
            Deskripsi
          </h1>
          <div v-if="`${campaign.description}`.length > 100">
            <p
              class="my-3 text-justify whitespace-pre-line"
              v-bind:class="[hiddenDetail ? 'line-clampin' : '']"
            >
              {{ campaign.description }}
            </p>
            <button
              v-if="hiddenDetail"
              class="border-none bg-none cursor-pointer hover:underline text-indigo-500 focus:outline-none"
              @click="showDetail()"
            >
              Lihat selengkapnya
            </button>
            <button
              v-else
              class="border-none bg-none cursor-pointer hover:underline text-indigo-500 focus:outline-none"
              @click="showDetail()"
            >
              Lihat lebih ringkas
            </button>
          </div>
          <div v-else>
            <p class="my-3 text-justify whitespace-pre-line">
              {{ campaign.description }}
            </p>
          </div>
        </div>
      </div>
      <div
        class="w-full border border-gray-300 border-opacity-50 sm:mx-5"
      ></div>
      <div
        class="relative grid grid-cols-1 w-full sm:px-5 sm:py-5 sm:gap-x-8 md:py-5"
      >
        <div class="col-start-1 px-3 mt-5 mb-2">
          <h1
            class="font-semibold text-2xl text-gray-700 subpixel-antialiased text-center pb-4"
          >
            Daftar Peserta
          </h1>
          <div
            class="sm:grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 sm:gap-3 my-3"
          >
            <div
              class="flex justify-start cursor-pointer text-gray-700 lg:bg-gray-100 bg-indigo-100 hover:bg-indigo-100 rounded-md px-2 py-2 xs:mb-2 items-center"
              v-for="member in campaign.campaign_members"
              :key="member.id"
            >
              <span
                v-if="member.is_pay === 0"
                class="bg-gray-500 h-3 w-3 m-2 rounded-full"
              ></span>
              <span
                v-else
                class="bg-yellow-400 h-3 w-3 m-2 rounded-full"
              ></span>

              <div class="font-medium px-2 truncate">
                {{ member.users.name }}
              </div>
            </div>

            <!-- ingat ada gray nih, bisa styling class based on data active or pending -->

            <div
              class="flex justify-start cursor-pointer text-gray-700 bg-green-200 rounded-md px-2 py-2 xs:mb-2"
              v-for="index in campaign.slot_capacity -
              (campaign.total_members - 1)"
              :key="index"
            >
              <div class="px-2 font-bold">Slot Kosong</div>
            </div>
          </div>
        </div>
        <div
          class="text-center my-5 md:my-10 xs:hidden"
          v-if="!registered || isDisable || !this.$store.state.auth.token"
        >
          <button
            class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
            v-bind:class="[!isLogin || isDisable ? 'opacity-50 ' : '']"
            @click.prevent="rsvpCheckout(campaign.id)"
            :disabled="isDisable"
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

              Daftar</span
            >
          </button>
        </div>
        <div class="text-center my-5 md:my-10 xs:hidden" v-else>
          <button
            class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-orange-400 hover:bg-orange-600 focus:bg-orange-700"
            v-bind:class="[!isLogin || isDisable ? 'opacity-50 ' : '']"
            @click.prevent="rsvpCheckout(campaign.id)"
            :disabled="isDisable"
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

              Menunggu Pembayaran</span
            >
          </button>
        </div>
      </div>
    </div>
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between bg-white w-full text-center pt-5 sm:hidden sticky bottom-0 min-w-screen"
      v-if="!registered || isDisable || !this.$store.state.auth.token"
    >
      <button
        class="w-1/3 xs:w-full mb-4 mt-7 py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        @click.prevent="rsvpCheckout(campaign.id)"
        v-bind:class="[!isLogin || isDisable ? 'opacity-50 ' : '']"
        :disabled="isDisable"
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

          Daftar</span
        >
      </button>
    </div>
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between bg-white w-full text-center pt-5 sm:hidden sticky bottom-0 min-w-screen"
      v-else
    >
      <button
        class="w-1/3 xs:w-full mb-4 mt-7 py-2 rounded text-white inline-block shadow-md bg-orange-500 hover:bg-orange-600 focus:bg-orange-700"
        @click.prevent="rsvpCheckout(campaign.id)"
        v-bind:class="[!isLogin || isDisable ? 'opacity-50 ' : '']"
        :disabled="isDisable"
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

          Menunggu Pembayaran</span
        >
      </button>
    </div>
  </div>
</template>
<script>
import IconSocial from '../Profil/IconSocial'

export default {
  components: { IconSocial },
  name: 'DetailCampaign',
  props: ['campaign', 'registered'],
  data() {
    return {
      hiddenDetail: true,
      loading: false,
    }
  },
  methods: {
    showDetail() {
      this.hiddenDetail = !this.hiddenDetail
    },
    rsvpCheckout(idCampaign) {
      if (this.isLogin) {
        if (this.registered) {
          this.$router.push(
            `/campaign/${idCampaign}/checkout/${this.$store.state.user.id}`
          )
        } else {
          this.loading = true

          this.$axios
            .$get(
              process.env.API_DEV_URL +
                `campaign/rsvp/${idCampaign}/${this.$store.state.user.id}/`
            )
            .then((resp) => {
              this.$router.push(
                `/campaign/${idCampaign}/checkout/${this.$store.state.user.id}`
              )
            })
            .catch((errors) => {
              console.dir(errors)
            })
        }
      } else {
        this.$router.push('/account/login')
      }
    },
  },
  computed: {
    isLogin() {
      return this.$store.state.auth.token
    },

    isDisable() {
      if (this.$store.state.auth.token) {
        return (
          this.campaign.id_host === this.$store.state.user.id ||
          this.$store.state.user.role === 'a'
          // this.statusDisable
        )
      } else {
        return false
      }
    },
  },
}
</script>

<style scoped>
.line-clampin {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  white-space: normal;
}
</style>
