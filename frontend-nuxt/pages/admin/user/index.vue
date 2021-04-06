<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
      Data User
    </h3>
    <div>
      <!-- <div v-if="users.length == 0"></div> -->
      <DataTableUser
        :users="users"
        :block-user="blockUser"
        :activate-user="activateUser"
      />
    </div>
  </div>
</template>
<script>
import DataTableUser from '@/components/DataTables/UserTable'
import Breadcrumb from '@/components/Breadcrumb'

export default {
  components: { DataTableUser, Breadcrumb },
  data() {
    return {
      users: [],
      breadcrumbs: [],
    }
  },
  methods: {
    blockUser(id) {
      this.$axios
        .$get(`user/deactivate/${id}/2`)
        .then((resp) => {
          this.loadingBlock = true
          if (resp.message == 'SUCCESS') {
            location.reload()
            // this.$destroy()
          }
          console.log(resp)
        })
        .catch((errors) => {
          console.log(errors)
        })
    },

    activateUser(id) {
      // this.loadingActivate = true
      this.$axios
        .$get(`user/deactivate/${id}/1`)
        .then((resp) => {
          this.loadingBlock = true
          if (resp.message == 'SUCCESS') {
            this.loadingActivate = false
            location.reload()
            // this.$destroy()
          }
          console.log(resp)
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
  },
  mounted() {
    // console.log(this.users)
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
        console.log(this.users)
        // setTimeout(() => this.$nuxt.$loading.finish(), 5000)
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>
