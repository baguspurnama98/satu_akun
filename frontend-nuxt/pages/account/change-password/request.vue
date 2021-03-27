<
<template>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md py-5">
            <form @submit.prevent="requestPassword" class="bg-gray-100 shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4 ">
                <!-- @csrf -->
                <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
                    Lupa Password
                </div>
                <p class="text-gray-900">Kami akan mengirimkan kode unik beserta link pada email kamu. Pastikan email kamu benar.</p>
                <p></p>
                <div class="my-8">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" 
                    v-model="form.email" @keydown="errorStatus = false" />
                </div>
                <div class="mt-4 mb-3 flex items-center justify-center">
                    <button class="px-6 py-2 min-w-full rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        <span class="inline-flex items-center p-0 m-0">
                        <svg v-if="loading" 
                            class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                            Kirim
                        </span>
                    </button>
                </div>
                <div class="flex justify-center">
                    <NuxtLink to="#" class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800 cursor-pointer" href="#">
                        Butuh bantuan?
                    </NuxtLink>
                </div>
            </form>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      errorStatus: false,
      errorCode: '',
      errorMessage: '',
      form: {
        email: '',
      },
    }
  },
  computed: {
      isPassConfirm() {
        return (
            this.form.password !== this.form.password_confirmation &&
            this.form.password_confirmation !== ''
        );
      },
  },
  methods: {
    requestPassword() {
      this.loading = true
      this.$axios
        .$post(`auth/forget-password`, {
          email: this.form.email,
        })
        .then((resp) => {
            this.loading = false
            const {id_user, token} = resp
          this.$router.replace(`/account/change-password/${id_user}?t=${token}`)
        })
        .catch((errors) => {
          this.loading = false
          console.dir(errors)
        })
    },
  },
  async mounted() {},
}
</script>
