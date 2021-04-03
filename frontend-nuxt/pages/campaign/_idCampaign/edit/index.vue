<template>
  <div>
    <ManageCampaign :task="'edit'" />
  </div>
</template>
<script>
import moment from 'moment'
import loadImage from 'blueimp-load-image'
import ManageCampaign from '@/components/Campaign/ManageCampaign'

export default {
  name: 'Create_Campaign',
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
