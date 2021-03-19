<
<template>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-12">
        <div class="w-full max-w-md py-5">
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
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-0 focus:border-indigo-500 focus:outline-none" type="password" placeholder="Password" name="password" required autocomplete="current-password" 
                    v-model="form.password" @keydown="errorStatus = false" />
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
                    <a class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800" href="#">
                        Butuh bantuan?
                    </a>
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
          this.$store.dispatch('auth/setToken', { token, expires_in })
          // this.$router.push({name: 'secret'});
          console.log({ token, expires_in })
          this.getProfile({ token, expires_in })
          // jangan kembali ke otp
            // 
        
          // if (this.$router.history._startLocation.split('/').indexOf('validate-otp') != -1) {
          //       //   aku jadi error wkwkw
          //       // skenarionya aku langsung buka link dari gmail dan semua tab hp ku ttg situs ini udah dihapus, jadi pas -2 dah rusak
          //     this.$router.back() // aku ubah 2 link sebelumnya, u/ mengatasi ketika dia daftar, biar tidak langsung ke halaman checkout
          // } else {
          //     window.location.replace('/')
          
          // }  proses direct routingnya aku pindah ke getProfile, soalnya error trs buat dptin datausernya
         
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
    getProfile(token) {
      const config = {
        headers: { Authorization: `Bearer ${token}` },
      }
      this.$axios
      .$get('profile', null, config)
      .then((res)=>{
      this.$store.dispatch('getUserProfile', res.user)
      
      const histURL = this.$router.history._startLocation.split('/')
      const lastURL = histURL[histURL.length - 1]

       if (lastURL == 'checkout') {  // disini aku coba nyelesaiin masalah skenariomu
           this.$router.go(-2)
        } 
        else if(lastURL == 'create'){
          window.location.replace(this.$nuxt.context.from.fullPath)
        }
         else {
          window.location.replace('/')  
        }
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
