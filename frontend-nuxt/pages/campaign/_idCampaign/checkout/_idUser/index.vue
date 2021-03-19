<template>
  <div class="container px-4 mx-auto flex flex-wrap items-start justify-between">
    <div class="w-full">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">Checkout</h3>
      <div class="">
        <div class="p-3 rounded-lg">
          <p class="xs:text-sm text-justify sm:text-center">
            Segera lakukan pembayaran agar proses pendaftaran Anda valid. Pastikan Anda
            melakukan transfer hingga 3 digit terakhir untuk memudahkan kami melakukan
            validasi pembayaran Anda.
          </p>
        </div>

        <div class="rounded-lg mt-2 mx-2 lg:mx-56 p-2 xs:text-sm h-1/3">
          <div class="flex flex-initial">
            <img
              class="h-auto self-center"
              width="75"
              src="https://img2.pngio.com/bank-negara-indonesia-logo-bank-bni-transparan-clipart-full-bank-negara-indonesia-png-3126_906.png"
            />

            <div class="ml-3 md:p-2 text-left xs:text-sm sm:text-md">
              <p>{{ transaction.bank }}</p>
              <p>Tasya Tobing</p>
            </div>
          </div>
        </div>
        <div
          class="border pl-5 xs:pl-2 rounded-lg mx-2 lg:mx-56 p-2 xs:text-sm h-1/3 bg-indigo-100"
        >
          <div class="inline-flex">
            <span
              @click.stop.prevent="copyToClipboard"
              class="cursor-pointer text-3xl font-semibold xs:text-xl"
              >12354453234675</span
            >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-5 w-5 self-center xs:h-4 xs:w-4 ml-5 justify-self-center font-semibold cursor-pointer rounded-lg bg-yellow-200"
              @click.stop.prevent="copyToClipboard"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
              />
            </svg>
          </div>
          <input type="hidden" id="copy-input" :value="12354453234675" />
        </div>
        <div
          class="border rounded-lg grid grid-cols-2 gap-1 m-2 lg:mx-56 py-3 xs:text-sm"
        >
          <div class="pl-5 xs:pl-2">
            <span class="font-medium">No. Transaksi</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ transaction.no_transaction }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-medium">Judul Campaign</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ campaign.title }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-medium">Durasi</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ campaign.durasi }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-medium">Nominal</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ transaction.nominal | formatRupiah }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-medium">Kode Unik</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ transaction.unique_code }}</span>
          </div>

          <div class="pl-5 xs:pl-2">
            <span class="font-bold">Total Nominal</span>
          </div>
        </div>
        <div
          class="border rounded-lg pl-5 xs:pl-2 mx-2 lg:mx-56 p-2 xs:text-sm h-1/3 bg-indigo-100"
        >
          <div class="inline-flex">
            <span
              @click.stop.prevent="copyToClipboard"
              class="cursor-pointer text-3xl font-semibold xs:text-xl"
              id="testing-code"
              >{{ transaction.total_nominal | formatRupiah }}</span
            >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-5 w-5 self-center xs:h-4 xs:w-4 ml-5 justify-self-center font-semibold cursor-pointer rounded-lg bg-yellow-200"
              @click.stop.prevent="copyToClipboard"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
              />
            </svg>
          </div>
        </div>
        <div
          class="border flex pl-5 xs:pl-2 rounded-lg mt-2 lg:mx-56 p-2 xs:text-sm h-1/3 bg-yellow-200"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="h-5 w-5 self-center mr-3"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
            />
          </svg>
          <span class="self-center font-semibold text-md xs:text-sm"
            >Pastikan nominal sesuai hingga 3 digit terakhir</span
          >
        </div>
        <div class="p-3 mt-3 rounded-lg">
          <p class="xs:text-sm text-center xs:text-justify">
            Segera lakukan pembayaran sebelum
            <span class="font-bold">12 Januari 2020 14.00 WIB</span> atau transaksimu akan
            dibatalkan otomatis oleh sistem
          </p>
          <p class="xs:text-sm text-center xs:text-justify">
            Setelah melakukan pembayaran, kirimkan bukti pembayaran ke
            <span class="font-semibold"
              ><a
                href="https://wa.me/8976634788?text=Saya%20ingin%20konfirmasi%20pembayaran"
                >WhatsApp Patungin.com</a
              ></span
            >
            atau klik tombol dibawah ini.
          </p>
          <p class="text-sm text-center xs:text-justify italic">
            <b>*</b>Kami hanya melayani proses konfirmasi pembayaran pada pukul
            <b>08.00 - 18.00 WIB</b>. Jika Anda melakukan konfirmasi pembayaran diatas jam
            tersebut, maka proses Anda akan kami proses pada hari selanjutnya.
          </p>
        </div>
      </div>
    </div>

    <div class="w-full text-center my-3 md:my-5">
      <a
        class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        type="submit"
        href="https://wa.me/8976634788?text=Saya%20ingin%20konfirmasi%20pembayaran"
      >
        Saya sudah transfer
      </a>
    </div>
    <input type="hidden" id="copy-input" :value="transaction.total_nominal" />
    <!-- Notification -->
    <div
      class="container h-screen fixed px-4 my-auto mx-auto flex flex-wrap justify-between"
      v-bind:class="[showAlertCopied ? 'hidden' : '']"
    >
      <div class="mx-auto">
        <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
          <div class="flex flex-row">
            <div class="px-2">
              <svg
                width="25"
                height="25"
                viewBox="0 0 1792 1792"
                fill="#34d399"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"
                />
              </svg>
            </div>
            <div class="ml-2 mr-6 items-center">
              <span class="">Successfully Copied!</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CheckoutCampaign",

  data() {
    return {
      campaign: {
          title: null,
          durasi: null,
      },
      user: {
          name: null
      },
      transaction: {
          nominal: null,
          unique_code: null,
          total_nominal: null,
          bank: null,
          no_transaction: null,
          no_rek_destination: null,
      },
      showAlertCopied: true,
    };
  },
  methods: {
    handleAlertCopied() {
      this.showAlertCopied = !this.showAlertCopied;
    },
    copyToClipboard() {
      let dataToCopy = document.querySelector("#copy-input");
      dataToCopy.setAttribute("type", "text");
      dataToCopy.select();

      try {
        var successful = document.execCommand("copy");

        this.showAlertCopied = !this.showAlertCopied;
        setTimeout(() => (this.showAlertCopied = true), 600);
      } catch (err) {
        alert("Oops, unable to copy");
      }
      dataToCopy.setAttribute("type", "hidden");
      window.getSelection().removeAllRanges();
    },
  },
  async created() {
    const { idUser, idCampaign } = this.$route.params;
    await this.$axios
      .$get(`transaction/user/${idUser}/campaign/${idCampaign}`)
      .then((resp) => {
        this.transaction = resp.transactions[0];
        this.campaign = this.transaction.campaigns
        this.user = this.transaction.users
      })
      .catch((errors) => {
        if (errors.response.status === 404) {
          return this.$nuxt.error({
            statusCode: 404,
            message: "Post not found",
          });
        }
      });
  },

  //   beforeMount() {
  //  this.$axios
  //       .$get(
  //         process.env.API_DEV_URL + `campaign/${this.$route.params.idCampaign}`
  //       )
  //       .then((resp) => {
  //         this.campaign = resp.campaigns
  //         console.log(this.campaign)
  //       })
  //       .catch((errors) => {
  //         if (errors.response.status === 404) {
  //           console.log('oke')
  //           return this.$nuxt.error({
  //             statusCode: 404,
  //             message: 'Post not found',
  //           })
  //         }
  //       })
  //   }
};
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
