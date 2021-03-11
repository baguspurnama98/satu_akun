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
        id_host: '',
        list_idMembers: [],
        total_members: 0,
        slot_capacity: 0,
        campaign_members: [],
      },
    }
  },
  beforeMount() {
    console.log(this.$store.state.auth.token)
    this.$axios
      .$get(
        process.env.API_DEV_URL + `campaign/${this.$route.params.idCampaign}`
      )
      .then((resp) => {
        let list_idMembers = []

        if (resp.campaigns.campaign_members.length !== 1) {
          for (let i = 0; i < resp.campaigns.campaign_members.length; i++) {
            if (resp.campaigns.campaign_members[i].is_host === 1) {
              resp.campaigns.host_name =
                resp.campaigns.campaign_members[i].users.name
              resp.campaigns.id_host = resp.campaigns.campaign_members[i].id
              resp.campaigns.list_members = resp.campaigns.campaign_members.splice(
                i,
                1
              )
            }
            list_idMembers.push(resp.campaigns.campaign_members[i].users.id)
          }
        } else {
          resp.campaigns.host_name =
            resp.campaigns.campaign_members[0].users.name
          resp.campaigns.id_host = resp.campaigns.campaign_members[0].id
          resp.campaigns.list_members = []
        }

        resp.campaigns.list_idMembers = list_idMembers
        this.campaign = resp.campaigns
        console.log(this.campaign)
      })
      .catch((errors) => {
        console.log(errors)
        // if (errors.response.status === 404) {
        //   console.log('oke')
        //   return this.$nuxt.error({
        //     statusCode: 404,
        //     message: 'Post not found',
        //   })
        // }
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
