<template>
  <section class="text-gray-600 body-font overflow-hidden">
    <div class="container mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap px-5">
        <img
          class="lg:w-1/2 w-full lg:h-full h-64 object-cover object-center rounded"
          :src="
            campaign.media_url !== ``
              ? campaign.media_url
              : require(`~/assets/img/default-img.jpeg`)
          "
          alt="ecommerce"
        />
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">
            Campaign Akun
          </h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
            {{ campaign.title }}
          </h1>
          <div class="flex mb-4">
            <span class="flex items-center text-gray-600">
              {{ campaign.host_name.name }}
            </span>
            <span class="flex ml-3 pl-3 border-l-2 border-gray-200 space-x-2s">
              <icon-social class="lg:mt-6"></icon-social>
            </span>
          </div>
          <div class="py-3 mb-3">
            <div>
              <div v-if="`${campaign.description}`.length > 100">
                <p
                  class="mb-3 text-justify"
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
                <p class="mb-3 text-justify">
                  {{ campaign.description }}
                </p>
              </div>
            </div>
            <!-- Template ini hanya akan muncul ketika yang login adalah pemilik host atau slot dan status sudah berlangsung atau selesai -->
            <template v-if="true">
              <!-- disini isinya element informasi akun -->
              <div class="py-3 mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Informasi Campaign
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  Detail personal campaign yang dapat digunakan.
                </p>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-600">
                      Alamat Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      {{ campaign.email_id }}
                    </dd>
                  </div>
                </dl>
                <dl>
                  <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-600">Password</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      {{ campaign.password_email }}
                    </dd>
                  </div>
                </dl>
                <dl>
                  <div class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-600">
                      Nomor Telepon
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      0897432123124
                    </dd>
                  </div>
                </dl>
              </div>
            </template>
          </div>
          <div
            class="flex mt-6 items-center pt-5 border-t-2 border-gray-100 justify-between"
          >
            <!-- Batalkan dan Edit hanya aktif ketika dia adalah host dan status masih aktif -->
            <button
              class="flex mx-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded"
              v-if="
                campaign.status === 0 &&
                campaign.host_name.id === this.$store.state.user.id
              "
            >
              Batalkan
            </button>
            <button
              class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded"
              v-if="
                campaign.status === 0 &&
                campaign.host_name.id === this.$store.state.user.id
              "
            >
              Edit
            </button>
            <!-- Ajukan perpanjangan hanya aktif ketika dia adalah slot dan status expired -->
            <button
              class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded"
              v-if="
                campaign.status === 2 &&
                campaign.host_name.id !== this.$store.state.user.id
              "
            >
              Perpanjang
            </button>
            <!-- Laporkan hanya aktif ketika dia adalah slot dan status berlangsung -->
            <button
              class="flex mx-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded"
              v-if="
                campaign.status === 1 &&
                campaign.host_name.id !== this.$store.state.user.id
              "
            >
              Laporkan
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import IconSocial from '../../Profil/IconSocial'
export default {
  name: 'DashboardCampaign',
  components: { IconSocial },
  // status: aktif, ekspired, berlangsung, refund
  // ini bakal dapatin data si pemilik host juga
  props: ['postTitle', 'user_role', 'campaign'],
  // kita pakai props, data disini hanya sebagai contoh
  data() {
    return {
      detail: true,
    }
  },

  methods: {
    showDetail() {
      this.detail = !this.detail
    },
  },
}
</script>

<style scoped>
.line-clampin {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
</style>
