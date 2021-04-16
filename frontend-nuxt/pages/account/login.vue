<
<template>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-8">
        <div class="w-full max-w-md py-5 px-3">
            <form @submit.prevent="login" class="bg-gray-100 shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4 ">
                <!-- @csrf -->
                <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
                    Masuk
                </div>
                <div class="mb-4">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" 
                    v-model="form.email" @keydown="errorStatus = false" />
                </div>
                <div class="">
                    <label for="password" class="text-sm font-semibold text-gray-600">Password</label>
                    <div class="py-2" x-data="{ hiddenPass: true }">
                <div class="relative">
                  <input :type="hiddenPass ? 'password' : 'text'" class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none" placeholder="Password" name="password" required autocomplete="current-password" 
                    v-model="form.password" @keydown="errorStatus = false">
                  <div class="absolute inset-y-0 right-0 pr-5 flex items-center text-sm  ">

                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="hiddenPass = !hiddenPass">
                      <template v-if="hiddenPass === true">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                      />
                    </template>
                    <template v-else>
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                      />
                    </template>
                  </svg>
                  </div>
                </div>
              </div>
                </div>
                <span class="text-red-500 font-medium py-2 text-xs" v-if="errorStatus">{{ errorMessage }}</span>
                <span v-if="errorCode == 404 && errorStatus == true" class="text-indigo-500 font-medium py-2 underline text-sm cursor-pointer" @click.prevent="resendOtp">Kirim ulang OTP?</span>
                <div class="mt-4 mb-3 flex items-center justify-between">
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
                            Masuk
                        </span>
                    </button>
                    <!-- Kenapa kita ga provide lupa password? Karena kita gabisa otomatis kirim link ke email mereka, harus manual -- knp ngga bisa? bukannya tinggal pake request api by email user pake findOrFail, kalo nemu send email smtp ke email tsb(?)koreksi kalo salah... -->
                    <NuxtLink to="change-password/request" class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800">
                        Lupa password?
                    </NuxtLink>
                </div>
                <div class="flex">
                    <NuxtLink to="/account/register" class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800 cursor-pointer" href="#">
                        Belum punya akun?
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
      hiddenPass:true,
      errorStatus: false,
      errorCode: '',
      errorMessage: '',
      idUser: '',
      form: {
        email: '',
        password: '',
      },
    }
  },
  methods: {
    login() {
      this.loading = true
      this.$axios
        .$post('auth/login', {
          email: this.form.email,
          password: this.form.password,
        })
        .then(({ token, expires_in }) => {
            this.loading = false
          this.$store.dispatch('auth/setToken', { token, expires_in })
          // this.$router.push({name: 'secret'});
          this.getProfile(token)
         
        })
        .catch((errors) => {
          this.loading = false
          const { status, data } = errors.response
          if (status === 404 || status === 401 || status === 409) {
            this.errorStatus = true
            this.errorCode = status
            this.errorMessage = 'Pengguna tidak ditemukan';
          }
          if (status === 404) { 
            this.errorMessage = 'Akun belum divalidasi'
            this.idUser = data['id_user']
          }
        })
    },
    async getProfile(token) {
      const config = {
        headers: { Authorization: `Bearer ${token}` },
      }
     await this.$axios
      .$get('profile', null, config)
      .then((res)=>{
      this.$store.dispatch('getUserProfile', res.user)
      let routeBefore = this.$nuxt.context.from.fullPath
      const histURL = routeBefore.split('/')
      // const lastURL = histURL[histURL.length - 1]

      console.log('login',histURL)
      if(histURL[1] === 'account'){
        window.location.replace('/')
      }
      else if(histURL[3] === 'verification'){
        this.$router.push(this.$nuxt.context.from.fullPath)
      }
      else {
        this.$router.go(-1)
      }
    //  if (lastURL === 'checkout') { 
          //  this.$router.go(-1)
          //  window.history.back(); // cadangan
        // } 
        // else if(lastURL === 'create'){
        //   // window.location.replace(this.$route.fullPath)
        //   this.$router.push('/create')
        // }
        //  else {
          // this.$router.back()
          // window.location.replace('/')  // entah kenapa jadi error, jadi sementara gini dulu ya
        // }
      })
      .catch((err) => console.log(err))
    },
    resendOtp() {
      let id_user = this.idUser
      this.$axios
        .$get(`auth/resend-otp/${id_user}`)
        .then((resp) => {
            window.location.replace(`/account/validate-otp/${id_user}`)
        })
        .catch((errors) => {
          console.dir(errors)
        })
    },
  },
  async mounted() {
  },
}
</script>
