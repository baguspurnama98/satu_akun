<template>
  <div>
    <ManageCampaign :task="'create'" />
  </div>
</template>
<script>
import moment from 'moment'
import loadImage from 'blueimp-load-image'
import ManageCampaign from '@/components/Campaign/ManageCampaign'

export default {
  name: 'Create_Campaign',
  beforeMount() {
    this.$destroy()
  },
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
