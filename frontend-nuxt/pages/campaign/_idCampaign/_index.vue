<template>
  <div>
    <!-- Content disini -->
    <DetailCampaign :campaign="campaign" :statusDisable="statusDisable" />
  </div>
</template>

<script>
import DetailCampaign from '@/components/Campaign/DetailCampaign'
export default {
  layout: 'default',
  components: { DetailCampaign },
  data() {
    return {
      statusDisable: true,
      campaign: {
        id_host: '',

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
              resp.campaigns.id_host =
                resp.campaigns.campaign_members[i].user_id
              resp.campaigns.list_members = resp.campaigns.campaign_members.splice(
                i,
                1
              )
            }
          }
        } else {
          resp.campaigns.host_name =
            resp.campaigns.campaign_members[0].users.name
          resp.campaigns.id_host = resp.campaigns.campaign_members[0].user_id
          resp.campaigns.list_members = []
        }

        resp.campaigns.list_idMembers = list_idMembers
        this.campaign = resp.campaigns
        console.log(this.campaign)
      })
      .catch((errors) => {
        // console.log(errors)
        if (errors.response.status === 404) {
          console.log('oke')
          return this.$nuxt.error({
            statusCode: 404,
            message: 'Post not found',
          })
        }
      })

    this.$axios
      .$get(
        process.env.API_DEV_URL +
          `campaign/members/${this.$route.params.idCampaign}/${this.$store.state.user.id}`
      )
      .then((resp) => {
        if (resp.campaign_members.length == 0) {
          this.statusDisable = false
        }
      })
  },
}
</script>
