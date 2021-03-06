<template>
  <div>
    <!-- Content disini -->
    <DetailCampaign :campaign="campaign" />
  </div>
</template>

<script>
import DetailCampaign from '@/components/Campaign/DetailCampaign'
export default {
  layout: 'default',
  components: { DetailCampaign },
  data() {
    return {
      campaign: {
        total_members: 0,
        slot_capacity: 0,
        campaign_members: [],
      },
    }
  },
  mounted() {
    // console.log(this.$store.state.auth.token)
    this.$axios
      .$get(
        process.env.API_DEV_URL + `campaign/${this.$route.params.idCampaign}`
      )
      .then((resp) => {
        console.log(resp)
        for (let i = 0; i < resp.campaigns.campaign_members.length; i++) {
          if (resp.campaigns.campaign_members[i].is_host === 1) {
            resp.campaigns.host_name =
              resp.campaigns.campaign_members[i].users.name
            resp.campaigns.campaign_members.splice(i, 1)
          }
        }
        this.campaign = resp.campaigns
        // console.log(resp)
      })
      .catch((errors) => {
        console.dir(errors)
      })
  },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
