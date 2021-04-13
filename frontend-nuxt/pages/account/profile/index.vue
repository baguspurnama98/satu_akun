<template>
  <div class="min-w-screen min-h-screen flex items-start justify-center px-5 py-5">
    <div class="bg-gray-100 md:w-1/2 text-gray-600 rounded-xl shadow-lg overflow-hidden">
      <div class="grid grid-flow-col w-full">
        <div class="w-full py-10 px-5 md:px-10">
          <div class="text-center mb-5">
            <h1 class="font-bold text-3xl text-indigo-500">Profil</h1>
          </div>
          <div
            v-show="successUpdate"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full max-w-md mb-5"
            role="alert"
          >
            <strong class="font-bold">Akun tidak terdaftar.</strong>
            <span class="block sm:inline">Masukkan alamat email terdaftar.</span>
            <span
              @click.prevent="errorStatus = false"
              class="absolute top-0 bottom-0 right-0 px-2 py-3"
            >
              <svg
                class="fill-current h-6 w-6 text-green-500"
                role="button"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <title>Close</title>
                <path
                  d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                />
              </svg>
            </span>
          </div>

          <form @submit.prevent="update">
            <div class="mb-4">
              <label for="name" class="text-sm font-semibold text-gray-600">Nama</label>
              <input
                class="mt-3 appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                name="name"
                type="text"
                :disabled="!isEdit"
                required
                autofocus
                placeholder="Nama"
                v-model="form.name"
              />
            </div>
            <div class="mb-4">
              <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
              <input
                class="mt-3 appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                name="email"
                type="email"
                :disabled="!isEdit"
                required
                autofocus
                placeholder="Email"
                v-model="form.email"
              />
            </div>
            <div class="mb-4">
              <label for="whatsapp" class="text-sm font-semibold text-gray-600"
                >WhatsApp</label
              >
              <input
                class="mt-3 appearance-none border rounded w-full py-3 px-3 text-gray-900focus:border-indigo-500 focus:outline-none"
                type="tel"
                placeholder="08123456xxxx"
                name="whatsapp"
                required
                :disabled="!isEdit"
                v-model="form.whatsapp"
                @keydown="isPhoneConfirm = false"
              />
            </div>
            <div class="mb-4">
              <label for="password" class="text-sm font-semibold text-gray-600"
                >Password</label
              >
              <div class="relative mt-3">
                <input
                  :type="hiddenPass ? 'password' : 'text'"
                  class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                  placeholder="Password"
                  name="password"
                  required
                  :disabled="!isEdit"
                  autocomplete="current-password"
                  v-model="form.password"
                />
                <div
                  class="absolute inset-y-0 right-0 pr-5 flex items-center text-sm"
                  @click="hiddenPass = !hiddenPass"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
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
            <label class="text-sm font-semibold text-gray-600"> Social Media </label>
            <span
              class="flex flex-row lg:ml-auto lg:mt-0 w-full md:w-auto"
              style="align-items: center"
            >
              <!-- Nanti ambil data dari database, kalau dia punya ig, maka class hidden di nonaktifin -->
              <a class="text-gray-500 hover:text-gray-800 cursor-pointer">
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                  ></path>
                </svg>
              </a>
              <input
                class="mt-3 appearance-none border rounded w-full ml-3 py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                type="text"
                placeholder="username"
                name="facebook"
                v-model="form.social.facebook"
                :disabled="!isEdit"
              />
            </span>
            <span
              class="flex flex-row lg:ml-auto lg:mt-0 w-full md:w-auto"
              style="align-items: center"
            >
              <a class="text-gray-500 hover:text-gray-800 cursor-pointer">
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                  ></path>
                </svg>
              </a>
              <input
                class="mt-3 appearance-none border rounded w-full ml-3 py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                type="text"
                placeholder="username"
                name="twitter"
                v-model="form.social.twitter"
                :disabled="!isEdit"
              />
            </span>
            <span
              class="flex flex-row lg:ml-auto lg:mt-0 w-full md:w-auto"
              style="align-items: center"
            >
              <a class="text-gray-500 hover:text-gray-800 cursor-pointer">
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path
                    d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                  ></path>
                </svg>
              </a>
              <input
                class="mt-3 appearance-none border rounded w-full ml-3 py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
                type="text"
                placeholder="username"
                name="instagram"
                v-model="form.social.instagram"
                :disabled="!isEdit"
              />
            </span>
            <div class="mt-10">
              <div v-if="!isEdit" class="w-full px-3 my-5">
                <button
                  class="px-6 py-2 w-full rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                  @click.prevent="isEdit = true"
                >
                  <div class="inline-flex items-center">Update Profil</div>
                </button>
              </div>
              <div class="w-full px-3 my-5 flex justify-between gap-10" v-else>
                <button
                  type="submit"
                  class="px-6 py-2 w-full inline-flex items-center justify-center rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
                >
                  <span class="inline-flex items-center justify-center">
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
                    Simpan
                  </span>
                </button>
                <button
                  @click.prevent="isEdit = false"
                  class="px-6 py-2 w-full rounded text-white shadow-lg bg-red-500 hover:bg-red-600 focus:bg-red-700"
                >
                  <div class="inline-flex items-center">Batal</div>
                </button>
              </div>
            </div>
          </form>
          <div
            v-if="account_login"
            class="container px-4 mt-4 mx-auto flex flex-wrap justify-center text-center"
          >
            <p class="my-4">
              Terima notifikasi dari Patungin untuk meningkatkan pengalaman pengguna
            </p>
            <div class="onesignal-customlink-container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import IconSocial from "@/components/Profil/IconSocial";

export default {
  name: "Register",
  components: { IconSocial },
  layout: "default",
  data() {
    return {
      isEdit: false,
      loading: false,
      hiddenPass: true,
      successUpdate: false,
      form: {
        name: "",
        email: "",
        password: "",
        whatsapp: "",
        otp: "",
        social: {
          instagram: "",
          facebook: "",
          twitter: "",
        },
      },
    };
  },
  fetch() {
    const { name, email, whatsapp, otp } = this.$store.state.user;
    this.form.name = name;
    this.form.email = email;
    this.form.whatsapp = whatsapp;
    this.form.otp = otp;
    this.getUserSocial();
  },
  computed: {
    account_login() {
      return this.$store.state.auth.token;
    },
  },
  methods: {
    update() {
      this.loading = true;
      let idUser = this.$store.state.user.id;
      this.$axios
        .$post(`auth/update/${idUser}`, {
          name: this.form.name,
          email: this.form.email,
          password: this.form.password,
          whatsapp: this.form.whatsapp,
          otp: this.form.otp,
        })
        .then((res) => {
          // berhasil, tampilkan sesuatu
          var self = this;
          this.$axios
            .$post(`user/${idUser}/social/set`, {
              instagram: this.form.social.instagram,
              twitter: this.form.social.twitter,
              facebook: this.form.social.facebook,
            })
            .then((res) => {
              self.loading = false;
              self.isEdit = false;
              self.successUpdate = true;
              self.$destroy();
              self.$fetch();
            })
            .catch((errors) => {
              this.loading = false;
            });
        })
        .catch((errors) => {
          // console.log(errors.response)
          this.loading = false;
          const { email, whatsapp } = errors.response.data;
          if (email) {
            // sudah ada email yg sama
            this.isEmailAlready = true;
          }
          if (whatsapp) {
            this.isWaAlready = true;
          }
        });
    },
    getUserSocial() {
      let idUser = this.$store.state.user.id;
      this.$axios
        .$get(`user/${idUser}/social`, {})
        .then((res) => {
          res.social_media.forEach((item) => {
            this.form.social[item.type] = item.username;
          });
        })
        .catch((errors) => {
          console.error(errors);
        });
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
