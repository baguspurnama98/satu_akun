<template>
  <div
    class="min-w-screen min-h-screen flex items-start justify-center px-5 py-5"
  >
    <form
      @submit.prevent="register"
      class="bg-gray-100 text-gray-500 rounded-3xl shadow-lg overflow-hidden"
      style="max-width: 1000px"
    >
      <div class="grid grid-flow-col grid-cols-2 xs:grid-cols-1 w-full">
        <div class="bg-indigo-500 py-10 px-10 flex items-stretch xs:hidden">
          <img src="~/assets/img/press_play.svg" class="self-center" />
        </div>
        <div class="w-full py-10 px-5 md:px-10">
          <div class="text-center mb-5">
            <h1 class="font-bold text-3xl text-indigo-500">Daftar</h1>
          </div>
          <div>
            <div class="mb-4">
              <label for="name" class="text-sm font-semibold text-gray-600"
                >Nama</label
              >
              <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                name="name"
                type="text"
                required
                autofocus
                placeholder="Nama"
                v-model="form.name"
              />
            </div>
            <div class="mb-4">
              <label for="email" class="text-sm font-semibold text-gray-600"
                >Email</label
              >
              <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                name="email"
                type="email"
                required
                autofocus
                placeholder="Email"
                v-model="form.email"
              />
            </div>
            <div class="mb-4">
              <label for="password" class="text-sm font-semibold text-gray-600"
                >Password</label
              >
              <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                type="password"
                placeholder="Password"
                name="password"
                required
                autocomplete="current-password"
                v-model="form.password"
              />
            </div>
            <div class="mb-4">
              <label
                for="password_confirmation"
                class="text-sm font-semibold text-gray-600"
                >Konfirmasi Password</label
              >
              <span
                v-if="isPassConfirm"
                class="ml-1 text-xs font-medium text-red-500"
                >Password tidak sama</span
              >
              <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                type="password"
                placeholder="Password"
                name="password_confirmation"
                required
                autocomplete="current-password"
                v-model="form.password_confirmation"
              />
            </div>
            <div class="mb-4">
              <label for="whatsapp" class="text-sm font-semibold text-gray-600"
                >WhatsApp</label
              >
              <span
                v-if="isPhoneConfirm"
                class="ml-1 text-xs font-medium text-red-500"
                >Masukan nomor dengan benar</span
              >
              <input
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-3 focus:border-indigo-500 focus:outline-none"
                type="tel"
                placeholder="08123456xxxx"
                name="whatsapp"
                required
                v-model="form.whatsapp"
                @keydown="isPhoneConfirm = false"
              />
            </div>

            <div class="">
              <div class="w-full px-3 my-5">
                <button
                  class="px-6 py-2 w-full rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                  type="submit"
                  v-bind:class="[isDisabled ? 'opacity-50' : '']"
                  :disabled="isDisabled"
                >
                  <div class="inline-flex items-center">
                    <svg
                      v-if="loading"
                      xmlns="http://www.w3.org/2000/svg"
                      class="animate-spin w-4 h-4 p-0 mr-1"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      viewBox="0 0 100 100"
                      preserveAspectRatio="xMidYMid"
                    >
                      <circle
                        cx="50"
                        cy="50"
                        fill="none"
                        stroke="#d5ccc2"
                        stroke-width="15"
                        r="35"
                        stroke-dasharray="164.93361431346415 56.97787143782138"
                        transform="matrix(1,0,0,1,0,0)"
                      ></circle>
                    </svg>
                    Daftar Sekarang
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Register',
  layout: 'default',
  data() {
    return {
      loading: false,
      isPhoneConfirm: false,
      form: {
        name: '',
        email: '',
        password: '',
        whatsapp: '',
        password_confirmation: '',
      },
    }
  },
  computed: {
    isDisabled() {
      return (
        !this.form.name ||
        !this.form.email ||
        !this.form.password ||
        this.form.whatsapp.length < 10 ||
        this.form.password !== this.form.password_confirmation
      )
    },
    isPassConfirm() {
      return (
        this.form.password !== this.form.password_confirmation &&
        this.form.password_confirmation != ''
      )
    },
  },
  methods: {
    register() {
      this.loading = true
      if (this.validatePhoneNumber(this.form.whatsapp)) {
        this.$axios
          .$post(process.env.API_DEV_URL + 'auth/register', {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
            whatsapp: this.form.whatsapp,
          })
          .then((res) => {
            // berhasil, tampilkan sesuatu
            this.$router.push(`/account/validate-otp/${res.user.id}`)
          })
          .catch((errors) => {
            console.log(errors)
            this.loading = false
          })
      } else {
        this.isPhoneConfirm = true
        this.loading = false
      }
    },
    validatePhoneNumber(input_str) {
      var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im
      return re.test(input_str)
    },
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
