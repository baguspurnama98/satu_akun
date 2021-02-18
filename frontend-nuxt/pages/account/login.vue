<
<template>
  <div>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-12">
        <div class="w-full max-w-md py-5">
            <form @submit.prevent="login" class="bg-gray-100 shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4 ">
                <!-- @csrf -->
                <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
                    Silakan Masuk
                </div>
                <div class="mb-4">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" 
                    v-model="form.email" />
                </div>
                <div class="mb-4">
                    <label for="password" class="text-sm font-semibold text-gray-600">Password</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-3 leading-tight focus:border-indigo-500 focus:outline-none" type="password" placeholder="Password" name="password" required autocomplete="current-password" 
                    v-model="form.password" />
                </div>
                <div class="mb-3 flex items-center justify-between">
                    <button class="px-6 py-2 rounded text-white inline-block shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        Masuk
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
  </div>
</template>

<script>
export default {
  data() {
      return {
          form: {
              email: '',
              password: '',
          }
      }
  },
  methods: {
    login() {
        this.$axios.$post(process.env.API_DEV_URL + 'auth/login', {
            email: this.form.email,
            password: this.form.password
        })
          .then(({token, expires_in}) => {
            this.$store.dispatch('setToken', {token, expires_in});
            // this.$router.push({name: 'secret'});
            console.log({token, expires_in})
            this.$router.push('/');
          })
          .catch(errors => {
            console.log(errors);
          });
    },
  },
  async mounted() {
    // sudah di set base URL itu axiosnya API_DEV_URL, coba pelajari di internet
    // nth kenapa pada proses development, selalu kena cors, maka terpaksa pakai process.env.API_DEV_URL
    console.log(process.env.API_DEV_URL)
    const trials = await this.$axios.$get(process.env.API_DEV_URL + "users");
    console.log(trials)
  }
}
</script>
