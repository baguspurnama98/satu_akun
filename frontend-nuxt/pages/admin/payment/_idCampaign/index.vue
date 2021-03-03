<template>
  <div>
    <CampaignDashboard :user_role="user_role" />

    <div class="container mx-auto flex items-center mt-6">
      <div class="lg:w-3/5 w-full mx-auto px-4 my-4 overflow-auto">
        <div class="inline-flex w-full justify-between mb-5">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Bagus Purnama <span>(Host)</span>
          </h3>
          <button
            class="text-white px-2 py-1 text-sm rounded-lg shadow-md bg-indigo-400 hover:bg-indigo-600 focus:outline-none"
          >
            Tambah
          </button>
        </div>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-600 pr-6">IN</span>
          <span class="text-gray-600">20 Oktober 2020</span>
          <span class="ml-auto text-gray-900">{{ 40000 | formatRupiah }}</span>
        </div>
        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-600 pr-6">IN</span>
          <span class="text-gray-600">12 Desember 2020</span>
          <span class="ml-auto text-gray-900">{{ 40000 | formatRupiah }}</span>
        </div>
        <div class="flex border-t border-b mb-6 border-gray-200 py-2">
          <span class="text-gray-600 pr-6">IN</span>
          <span class="text-gray-600">1 Januari 2021</span>
          <span class="ml-auto text-gray-900">{{ 40000 | formatRupiah }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CampaignDashboard from '@/components/Campaign/Dashboard/Campaign'

export default {
  // pasang ini jika ingin tidak bisa diakses kalau belum login
  components: { CampaignDashboard },
  layout: 'default',
  member_campaign: 6,
  data() {
    return {
      user_role: 'u',
    }
  },
  mounted() {
    this.user_role = this.$store.state.user.role
  },
}
</script>
