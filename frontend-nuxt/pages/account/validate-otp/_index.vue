<template>
  <div class="flex items-center justify-center bg-indigo-100">
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
</template>
<script>
export default {
  data() {
    return {
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
      this.$axios
        .$get(process.env.API_DEV_URL + `auth/validate/${id_user}/${code}`)
        .then((resp) => {
          if (resp.message != 'VALIDATE') return
          this.$router.push(`/account/login`)
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
