<template>
  <div
    class="container px-4 my-12 mx-auto flex-wrap justify-between min-h-screen"
  >
    <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
      Data Campaign Aktif
    </h3>
    <CampaignTable />
  </div>
</template>
<script>
import CampaignTable from '@/components/DataTables/CampaignTable'

export default {
  components: { CampaignTable },
  data() {
    return {}
  },
}
</script>
