<template>
  <div>
    <CampaignDashboard />
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
  // title ini harus di truncate

  components: { CampaignDashboard },
  layout: 'default',
  data() {
    return {}
  },
}
</script>
