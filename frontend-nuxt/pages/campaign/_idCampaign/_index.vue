<template>
  <div>
    <!-- Content disini -->
    <DetailCampaign :campaign="campaign" :registered="registered" :is-pay="is_pay" :social-host="social" />
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
      is_pay: false,
      social: {
        instagram: "",
        facebook: "",
        twitter: "",
      },
      campaign: {
        id_host: '',
        total_members: 0,
        slot_capacity: 0,
        campaign_members: [],
      },
    }
  },
  methods: {
    getUserSocial() {
      let idUser = this.campaign.id_host;
      this.$axios
        .$get(`user/${idUser}/social`, {})
        .then((res) => {
          res.social_media.forEach((item) => {
            this.social[item.type] = item.username;
          });
        })
        .catch((errors) => {
          console.error(errors);
        });
    },
  },
  beforeMount() {
    this.$destroy();
    this.$axios
      .$get(`campaign/${this.$route.params.idCampaign}`)
      .then((resp) => {
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
        this.getUserSocial();
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
            
          } else if (resp.campaign_members[0].is_pay) this.is_pay = true
        })
    }
  },
}
</script>
