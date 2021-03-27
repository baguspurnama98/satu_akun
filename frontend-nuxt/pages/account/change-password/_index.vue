<
<template>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-8">
        <div class="w-full max-w-md py-5">
            <form @submit.prevent="updatePassword" class="bg-gray-100 shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4 ">
                <!-- @csrf -->
                <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
                    Ganti Password
                </div>
                <div class="mb-4">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" 
                    v-model="form.email" @keydown="errorStatus = false" />
                </div>
                <div class="mb-4">
                    <label for="otp-patungin" class="text-sm font-semibold text-gray-600">OTP</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none" name="otp-patungin" type="number" inputmode="numeric" pattern="[0-9]*" required autofocus placeholder="Kode OTP" 
                    v-model="form.otp" @keydown="errorStatus = false" />
                </div>
                <div class="mb-4">
                    <label for="password" class="text-sm font-semibold text-gray-600">Password Baru</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-0 focus:border-indigo-500 focus:outline-none" type="password" placeholder="Password" name="password" required autocomplete="current-password" 
                    v-model="form.password" @keydown="errorStatus = false" />
                </div>
                <div class="mb-4">
                    <label
                        for="password_confirmation"
                        class="text-sm font-semibold text-gray-600"
                        >Konfirmasi Password</label
                    >
                    <span v-if="isPassConfirm" class="ml-1 text-xs font-medium text-red-500"
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
                <span class="text-red-500 font-medium py-2 text-xs" v-if="errorStatus">{{ errorMessage }}</span>
                <div class="mt-4 mb-3 flex items-center justify-center">
                    <button class="px-6 py-2 min-w-1/3 rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        <span class="inline-flex items-center p-0 m-0">
                        <svg v-if="loading" 
                            class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                            Simpan Perubahan
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
        otp: '',
        email: '',
        password: '',
        password_confirmation: '',
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
    updatePassword() {
      let id_user = this.$route.params.index
      let token = this.$route.query.t
      this.$axios.setToken(token, 'Bearer')
      this.loading = true
      this.$axios
        .$post(`auth/update/${id_user}`, {
          otp: this.form.otp,
          email: this.form.email,
          password: this.form.password,
          password_confirmation: this.form.password_confirmation
        })
        .then((resp) => {
            this.loading = false
          this.$router.replace(`/account/login`)
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
