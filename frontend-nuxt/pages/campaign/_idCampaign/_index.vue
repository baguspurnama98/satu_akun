<template>
  <div>
    <!-- Content disini -->
    <DetailCampaign :campaign="campaign" :registered="registered" />
  </div>
</template>

<script>
import DetailCampaign from '@/components/Campaign/DetailCampaign'
export default {
  layout: 'default',
  components: { DetailCampaign },
  data() {
    return {
      registered: true,
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
      .$get(`campaign/${this.$route.params.idCampaign}`)
      .then((resp) => {
        console.log(resp.campaigns)
        for (let i = 0; i < resp.campaigns.campaign_members.length; i++) {
          if (resp.campaigns.campaign_members[i].is_host === 1) {
            resp.campaigns.host_name =
              resp.campaigns.campaign_members[i].users.name
            resp.campaigns.id_host = resp.campaigns.campaign_members[i].user_id
            if (resp.campaigns.campaign_members.length === 1) {
              resp.campaigns.campaign_members = []
            } else {
              resp.campaigns.campaign_members.splice(i, 1)
            }
          }
        }

        this.campaign = resp.campaigns
        console.log(this.campaign)
      })
      .catch((errors) => {
        if (errors.response.status === 404) {
          console.log('oke')
          return this.$nuxt.error({
            statusCode: 404,
            message: 'Post not found',
          })
        }
      })

    if (this.$store.state.auth.token) {
      this.$axios
        .$get(`campaign/members/${this.$route.params.idCampaign}/${this.$store.state.user.id}`)
        .then((resp) => {
          if (resp.campaign_members.length == 0) {
            this.registered = false
          }
        })
    }
  },
}
</script>
