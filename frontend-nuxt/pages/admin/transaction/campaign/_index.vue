<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <div v-if="campaigns === undefined">
      <Spinner />
    </div>
    <div v-else>
      <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
        Data Payment Per Anggota
      </h3>
      <div v-if="campaigns === null" class="w-full text-center">
        <h1
          class="font-bold py-10 text-4xl xs:text-2xl text-red-500 mx-auto inline-flex"
        >
          Data Kosong!
        </h1>
      </div>
      <div v-else>
        <div class="flex border-t border-gray-200 py-2 w-3/4 px-5 mx-auto">
          <span class="text-gray-600 pr-6">IN</span>
          <span class="text-gray-600">20 Oktober 2020</span>
          <span class="ml-auto text-gray-900">{{ 40000 | formatRupiah }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Breadcrumb from '@/components/Breadcrumb'
export default {
  components: { Breadcrumb },
  layout: 'default',
  data() {
    return {
      campaigns: undefined,
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
      .$get(`transaction/campaign/${this.$route.params.index}`)
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
