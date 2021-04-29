<
<template>
  <!-- component request -->
  <div class="flex items-center justify-center mt-8">
    <div class="w-full max-w-md py-5 px-3">
      <div
        v-show="errorStatus"
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full max-w-md mb-5"
        role="alert"
      >
        <strong class="font-bold">Akun tidak terdaftar.</strong>
        <span class="block sm:inline">Masukkan alamat email terdaftar.</span>
        <span
          @click.prevent="errorStatus = false"
          class="absolute top-0 bottom-0 right-0 px-2 py-3"
        >
          <svg
            class="fill-current h-6 w-6 text-red-500"
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
      <form
        @submit.prevent="requestPassword"
        class="bg-gray-100 shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4"
      >
        <!-- @csrf -->
        <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
          Lupa Password
        </div>
        <p class="text-gray-900">
          Kami akan mengirimkan kode unik beserta link pada email kamu. Pastikan email
          kamu benar.
        </p>
        <p></p>
        <div class="my-8">
          <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
          <div class="py-2 relative">
            <input
              class="appearance-none border rounded w-full py-3 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none"
              name="email"
              type="email"
              required
              autofocus
              placeholder="Email"
              v-model="form.email"
              @keydown="errorStatus = false"
            />
          </div>
        </div>
        <div class="mt-4 mb-3 flex items-center justify-center">
          <button
            class="px-6 py-2 min-w-full rounded text-white shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
            type="submit"
          >
            <span class="inline-flex items-center p-0 m-0">
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
              Kirim
            </span>
          </button>
        </div>
        <div class="flex justify-center">
          <NuxtLink
            to="#"
            class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800 cursor-pointer"
            href="#"
          >
            Butuh bantuan?
          </NuxtLink>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      errorStatus: false,
      errorCode: "",
      errorMessage: "",
      form: {
        email: "",
      },
    };
  },
  computed: {
    isPassConfirm() {
      return (
        this.form.password !== this.form.password_confirmation &&
        this.form.password_confirmation !== ""
      );
    },
  },
  methods: {
    requestPassword() {
      this.loading = true;
      this.$axios
        .$post(`auth/forget-password`, {
          email: this.form.email,
        })
        .then((resp) => {
          this.loading = false;
          const { id_user, token } = resp;
          this.$router.replace(`/account/change-password/${id_user}?t=${token}`);
        })
        .catch((errors) => {
          this.loading = false;
          this.errorStatus = true;
          console.dir(errors);
        });
    },
  },
  async mounted() {},
};
</script>
