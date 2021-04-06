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
      <EmailTable
        :data_emails="data_emails"
        :show-modal="showModal"
        :delete-email="deleteEmail"
        :loadingDelete="loadingDelete"
      />
      <EmailModal
        :create-email="createEmail"
        @clicked="showModal"
        :todo="todo"
        :new_email="new_email"
        :status="showModalStatus"
        :loadingProcess="loadingProcess"
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
      loadingDelete: false,
      loadingProcess: false,
      data_emails: [],
      breadcrumbs: [],
      showModalStatus: false,
      todo: 'edit',
      new_email: {
        email: '',
        info: '',
        status: '',
      },
    }
  },

  beforeMount() {
    console.log(this.$store.state.auth.token)
    this.$destroy()
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
      .$get('email')
      .then((resp) => {
        this.data_emails = resp.email
        console.log(this.data_emails)
        // setTimeout(() => this.$nuxt.$loading.finish(), 5000)
      })
      .catch((errors) => {
        console.log(errors)
      })
  },

  methods: {
    showModal(data, status) {
      if (status == 'edit') {
        this.new_email = {
          email: data.email,
          info: data.info,
          status: data.status,
          id: data.id,
        }
        console.log(this.new_email)
      }
      this.todo = status
      this.showModalStatus = !this.showModalStatus
    },

    createEmail(status, todo) {
      if (status) {
        this.loadingProcess = true
        console.log(this.new_email)
        if (todo == 'edit') {
          this.$axios
            .$post(`email/update/${this.new_email.id}`, this.new_email)
            .then((resp) => {
              if (resp.message === 'UPDATED') {
                location.reload()
              }
              console.log(this.data_emails)
            })
            .catch((errors) => {
              console.log(errors)
            })
        } else {
          this.$axios
            .$post('email/create', this.new_email)
            .then((resp) => {
              if (resp.message === 'CREATED') {
                location.reload()
              }
              console.log(this.data_emails)
            })
            .catch((errors) => {
              console.log(errors)
            })
        }
      } else {
        this.showModalStatus = !this.showModalStatus
      }
    },

    deleteEmail(id) {
      this.loadingDelete = true
      // console.log(id)
      this.$axios
        .$delete(`email/delete/${id}`)
        .then((resp) => {
          if (resp.message === 'DELETED') {
            location.reload()
          }
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
  },
}
</script>
