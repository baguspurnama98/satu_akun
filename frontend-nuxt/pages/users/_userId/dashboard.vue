<template>
  <div>
    <!-- Content disini -->
    <Landing />
  </div>
</template>

<script>
import Landing from '@/components/Hero/Landing'
import CardCampaign from '@/components/Campaign/CardCampaign'

export default {
  layout: 'default',
  components: { Landing, CardCampaign },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
