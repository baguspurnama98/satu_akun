<template>
  <div
    class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <div class="inline-flex w-full justify-between">
      <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">
        Kelola Email
      </h3>
      <div>
        <button
          class="px-4 py-2 rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700 font-bold"
          @click="showModal(null, 'add')"
        >
          <span class="inline-flex items-center p-0 m-0">
            <svg
              class="w-5 h-5 -ml-1 mr-1"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            Tambah Email
          </span>
        </button>
      </div>
    </div>

    <div>
      <!-- <div v-if="users.length == 0"></div> -->
      <EmailTable :emails="emails" @clicked="showModal" :todo="todo" />
      <EmailModal
        :status="showModalStatus"
        @clicked="showModal"
        :todo="todo"
        :selected="selected"
      />
    </div>
  </div>
</template>
<script>
import EmailTable from '@/components/DataTables/EmailTable'
import Breadcrumb from '@/components/Breadcrumb'
import EmailModal from '@/components/Modal/ManageEmail'

export default {
  components: { EmailTable, Breadcrumb, EmailModal },
  data() {
    return {
      emails: [
        {
          email: 'akun1@patungin.com',
          pass: '123',
          id: 1,
          status: 1,
        },
        { email: 'akun2patungin.com', pass: '123', id: 2, status: 0 },
      ],
      breadcrumbs: [],
      showModalStatus: false,
      todo: 'edit',
      selected: '',
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

    // this.$axios
    //   .$get(process.env.API_DEV_URL + 'users')
    //   .then((resp) => {
    //     this.users = resp.users
    //     console.log(resp)
    //     setTimeout(() => this.$nuxt.$loading.finish(), 5000)
    //   })
    //   .catch((errors) => {
    //     console.log(errors)
    //   })
  },

  methods: {
    showModal(data, status) {
      if (data != undefined) {
        this.selected = data
        console.log(this.selected)
      } else {
        this.selected = ''
      }
      this.todo = status
      this.showModalStatus = !this.showModalStatus
    },
  },
}
</script>
