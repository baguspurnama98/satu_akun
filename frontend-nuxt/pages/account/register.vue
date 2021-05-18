<template>
  <div class="min-w-screen min-h-screen flex items-start justify-center px-5 py-5">
    <form
      @submit.prevent="register"
      class="bg-gray-100 text-gray-500 rounded-3xl shadow-lg overflow-hidden"
      style="max-width: 1000px"
    >
      <div class="grid grid-flow-col grid-cols-2 xs:grid-cols-1 w-full">
        <div
          class="bg-indigo-500 py-10 px-10 flex items-stretch justify-center xs:hidden"
        >
          <div v-once ref="animation" class="self-center"></div>
        </div>
        <div class="w-full py-10 px-5 md:px-10">
          <div class="text-center mb-5">
            <h1 class="font-bold text-3xl text-indigo-500">Daftar</h1>
          </div>
          <div>
            <div class="mb-4">
              <label for="name" class="text-sm font-semibold text-gray-600">Nama</label>
              <div class="py-2 relative">
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
            </div>
            <div class="mb-4">
              <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
              <span v-if="isEmailAlready" class="ml-1 text-xs font-medium text-red-500"
                >Email sudah digunakan</span
              >
              <div class="py-2 relative">
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
            </div>
            <div class="mb-4">
              <label for="password" class="text-sm font-semibold text-gray-600"
                >Password</label
              >

              <div class="py-2 relative">
                <input
                  :type="hiddenPass ? 'password' : 'text'"
                  class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                  placeholder="Password"
                  name="password"
                  required
                  autocomplete="current-password"
                  v-model="form.password"
                />
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center text-sm">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    @click="hiddenPass = !hiddenPass"
                    :class="[hiddenPass == true ? 'hidden' : 'block']"
                  >
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
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    @click="hiddenPass = !hiddenPass"
                    :class="[hiddenPass == false ? 'hidden' : 'block']"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                    />
                  </svg>
                </div>
              </div>
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

              <div class="py-2">
                <div class="relative">
                  <input
                    :type="hiddenPassConfirm ? 'password' : 'text'"
                    class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                    placeholder="Password"
                    name="password"
                    required
                    autocomplete="current-password"
                    v-model="form.password_confirmation"
                  />
                  <div class="absolute inset-y-0 right-0 pr-5 flex items-center text-sm">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-gray-500"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      @click="hiddenPassConfirm = !hiddenPassConfirm"
                      :class="[hiddenPassConfirm == true ? 'hidden' : 'block']"
                    >
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
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-gray-500"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      @click="hiddenPassConfirm = !hiddenPassConfirm"
                      :class="[hiddenPassConfirm == false ? 'hidden' : 'block']"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-4">
              <label for="whatsapp" class="text-sm font-semibold text-gray-600"
                >WhatsApp</label
              >
              <span v-if="isWaAlready" class="ml-1 text-xs font-medium text-red-500"
                >WhatsApp sudah digunakan</span
              >
              <span v-if="isPhoneConfirm" class="ml-1 text-xs font-medium text-red-500"
                >Masukan nomor dengan benar</span
              >
              <div class="py-2 relative">
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
              <label
                class="flex items-center py-3 xs:pl-0"
                style="align-items: flex-start"
              >
                <input
                  type="checkbox"
                  name="expired"
                  class="form-tick h-6 w-6 xs:h-5 xs:w-5 focus:outline-none text-gray-600"
                  v-model="terms"
                />
                <span class="ml-3 xs:ml-2 text-gray-700 xs:text-sm"
                  >Data kamu aman, baca
                  <NuxtLink to="/tnc" class="text-red-500">Syarat dan Ketentuan</NuxtLink>
                  Patungin</span
                >
              </label>
            </div>

            <div class="">
              <div class="w-full px-3 my-5">
                <button
                  class="px-6 py-2 w-full rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                  type="submit"
                  v-bind:class="[isDisabled ? 'opacity-50' : '']"
                  :disabled="isDisabled || loading"
                >
                  <div class="inline-flex items-center">
                    <svg
                      v-if="loading"
                      class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                      ></circle>
                      <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                      ></path>
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
import lottie from "lottie-web";
import * as registerAnimation from "~/assets/lottie/register.json";

export default {
  name: "Register",
  layout: "default",
  data() {
    return {
      hiddenPass: true,
      hiddenPassConfirm: true,
      loading: false,
      isPhoneConfirm: false,
      isEmailAlready: false,
      isWaAlready: false,
      terms: false,
      form: {
        name: "",
        email: "",
        password: "",
        whatsapp: "",
        password_confirmation: "",
      },
    };
  },
  mounted() {
    lottie.loadAnimation({
      container: this.$refs["animation"], // the dom element that will contain the animation
      renderer: "svg",
      loop: true,
      autoplay: true,
      animationData: registerAnimation.default,
    });
  },
  computed: {
    isDisabled() {
      return (
        !this.form.name ||
        !this.form.email ||
        !this.form.password ||
        this.form.whatsapp.length < 10 ||
        this.form.password !== this.form.password_confirmation ||
        !this.terms
      );
    },
    isPassConfirm() {
      return (
        this.form.password !== this.form.password_confirmation &&
        this.form.password_confirmation != ""
      );
    },
  },
  methods: {
    register() {
      this.loading = true;
      if (this.validatePhoneNumber(this.form.whatsapp)) {
        this.$axios
          .$post("auth/register", {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
            whatsapp: this.form.whatsapp,
          })
          .then((res) => {
            // berhasil, tampilkan sesuatu
            this.$toast.show({
              title: "Berhasil Daftar",
              message: "Redirect ke halaman validasi OTP",
              classToast: "bg-green-500",
              classTitle: "text-white text-xl",
              classMessage: "text-white",
              classClose: "text-green-200",
              classTimeout: "bg-green-600",
              timeout: 4,
            });
            setTimeout(() => {
              this.$router.push(
                `/account/validate-otp/${res.user.id}?t=${res.user.token}`
              );
            }, 3500);
          })
          .catch((errors) => {
            // console.log(errors.response)
            this.loading = false;
            const { email, whatsapp } = errors.response.data;
            if (email) {
              // sudah ada email yg sama
              this.isEmailAlready = true;
              // setTimeout(()=>{
              //     this.$router.push('/account/login')
              // }, 5000)
            }
            if (whatsapp) {
              this.isWaAlready = true;
            }
          });
      } else {
        this.isPhoneConfirm = true;
        this.loading = false;
      }
    },
    validatePhoneNumber(input_str) {
      var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
      return re.test(input_str);
    },
  },
};
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
