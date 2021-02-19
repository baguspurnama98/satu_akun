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
                <span class="text-red-700 pl-3 text-sm" v-if="errorStatus">Email/password Anda salah</span>
                <div class="mt-4 mb-3 flex items-center justify-between">
                    <button class=" px-6 py-2 w-1/3 rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                    <span class="inline-flex items-center p-0 m-0">
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
                        Masuk</span>
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
       errorStatus:false,
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
        .$post(process.env.API_DEV_URL + 'auth/login', {
          email: this.form.email,
          password: this.form.password,
        })
        .then(({ token, expires_in }) => {
          this.$store.dispatch('auth/setToken', { token, expires_in })
          // this.$router.push({name: 'secret'});
          console.log({ token, expires_in })
          this.$router.push('/')
        })
        .catch((errors) => {
          this.loading = false
          if(errors.response.status === 404){
            this.errorStatus=true
          }
          console.log(errors.response.status)
        })
    },
  },
  async mounted() {
    // sudah di set base URL itu axiosnya API_DEV_URL, coba pelajari di internet
    // nth kenapa pada proses development, selalu kena cors, maka terpaksa pakai process.env.API_DEV_URL 
    //-B- menurutku emg hrs pake environment, biar terpusat atur urlnya trs hipotesisku kena cors waktu dev karena di env mu ngga pake http, ini udh aku tambahin
    // console.log(process.env.API_DEV_URL)
    const trials = await this.$axios
      .$get(process.env.API_DEV_URL + 'users')
      .catch((err) => console.log(err))
    console.log(trials)
  },
}
</script>
