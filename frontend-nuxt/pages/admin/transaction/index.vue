<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
      Data Payment
    </h3>
    <div>
      <!-- <div v-if="users.length == 0"></div> -->
      <PaymentTable :payments="payments" />
    </div>
  </div>
</template>
<script>
import PaymentTable from '@/components/DataTables/PaymentTable'
import Breadcrumb from '@/components/Breadcrumb'

export default {
  components: { PaymentTable, Breadcrumb },
  data() {
    return {
      payments: [
        {
          name: 'netflix 1 bulan',
          price: 180000,
          amount_collected: 180000,
          withdrawal: 93000,
          status: 50,
        },
      ],
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
      .$get('users')
      .then((resp) => {
        this.users = resp.users
        setTimeout(() => this.$nuxt.$loading.finish(), 5000)
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>
