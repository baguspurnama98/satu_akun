<template>
  <div class="bg-indigo-100 h-auto">
    <div class="items-center flex justify-center">
      <div
        class="bg-white rounded-lg shadow-md my-16 p-8 xs:px-2 xs:py-4 xs:mx-4"
      >
        <div class="px-2 pb-4">
          <div class="font-bold text-indigo-500 text-2xl">Kode OTP</div>
          <span class="text-sm text-gray-700"
            >OTP telah dikirimkan pada email saat kamu mendaftar</span
          >
          <span
            v-if="errorMessage != ''"
            class="text-xs font-medium text-red-500"
            >{{ errorMessage }}</span
          >
        </div>
        <div class="flex justify-between">
          <div v-for="(l, i) in pinlength" :key="`codefield_${i}`">
            <input
              :autofocus="i == 0"
              :id="`codefield_${i}`"
              style="border-width: 2px"
              class="border border-indigo-400 mx-2 rounded flex items-center text-center h-16 w-12 text-3xl xs:h-12 xs:w-10 xs:text-2xl"
              value=""
              maxlength="1"
              max="9"
              min="0"
              inputmode="decimal"
              @keyup="stepForward(i)"
              @keydown.backspace="stepBack(i)"
              @focus="resetValue(i)"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="items-center flex justify-center">
      <!-- Toast -->

      <div class="mx-auto place-self-start" :class="[toast ? '' : 'hidden']">
        <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-xl">
          <div class="flex flex-row">
            <div class="ml-2 mr-6 items-center">
              <span class="inline-flex items-center p-0 m-0"
                >Pendaftaran berhasil! Tunggu sebentar ya
                <svg
                  class="animate-spin ml-3 h-4 w-4 text-indigo-400 xs:text-sm"
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
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      toast: false,
      pinlength: 6,
      errorMessage: '',
    }
  },
  methods: {
    resetValue(i) {
      for (let x = 0; x < this.pinlength; x++) {
        if (x >= i) document.getElementById(`codefield_${x}`).value = ''
      }
    },
    stepForward(i) {
      if (
        document.getElementById(`codefield_${i}`).value &&
        i != this.pinlength - 1
      ) {
        document.getElementById(`codefield_${i + 1}`).focus()
        document.getElementById(`codefield_${i + 1}`).value = ''
      }
      this.checkPin()
    },
    stepBack(i) {
      if (document.getElementById(`codefield_${i - 1}`).value && i != 0) {
        document.getElementById(`codefield_${i - 1}`).focus()
        document.getElementById(`codefield_${i - 1}`).value = ''
      }
    },
    checkPin() {
      let code = ''
      for (let i = 0; i < this.pinlength; i++) {
        code = code + document.getElementById(`codefield_${i}`).value
      }
      if (code.length == this.pinlength) {
        this.validateOtp(code)
      }
    },
    validateOtp(code) {
      // Check pin on server
      let id_user = this.$route.params.index
      let token = this.$route.query.t
      this.$axios.setToken(token, 'Bearer')
      this.$axios
        .$get(`auth/validate/${id_user}/${code}`)
        .then((resp) => {
          console.log(resp.message)
          if (resp.message == 'VALIDATE') {
            this.toast = true
            setTimeout(() => {
              window.location.replace(`/account/login`)
            }, 2000)
          }
        })
        .catch((errors) => {
          const { message } = errors.response.data
          if (errors.response.status == 409) {
            this.errorMessage = message
          }
        })
    },
    mounted() {},
  },
  mounted() {},
}
</script>
