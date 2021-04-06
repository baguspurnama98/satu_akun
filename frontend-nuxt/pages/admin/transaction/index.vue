<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <div v-if="campaigns === null">
      <Spinner />
    </div>
    <div v-else>
      <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
        Data Payment
      </h3>
      <div>
        <PaymentTable :campaigns="campaigns" />
      </div>
    </div>
  </div>
</template>
<script>
import PaymentTable from '@/components/DataTables/PaymentTable'
import Breadcrumb from '@/components/Breadcrumb'
import Spinner from '@/components/Spinner.vue'

export default {
  components: { PaymentTable, Breadcrumb },
  data() {
    return {
      campaigns: null,
      breadcrumbs: [],
    }
  },

  mounted() {
    const fullPath = this.$route.fullPath
    const params = fullPath.substring(1).split('/')

    let path = ''
    let crumbs = []

    params.forEach((param, index) => {
      path = `${path}/${param}`
      const match = this.$router.match(path)

      //   Jika name route tidak null dan name route belum ada di crumbs
      if (
        match.name !== null &&
        crumbs.map((val) => val.name).indexOf(match.name) === -1
      ) {
        crumbs.push(match)
      }
    })
    this.breadcrumbs = crumbs

    this.$nextTick(() => {
      this.$nuxt.$loading.start()
    })

    this.$axios
      .$get('transaction/campaign')
      .then((resp) => {
        console.log(resp)
        this.campaigns = resp.campaigns
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>
