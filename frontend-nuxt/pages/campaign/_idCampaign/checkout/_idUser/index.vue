<template>
  <div class="container px-4 mx-auto flex flex-wrap items-start justify-between">
    <div class="w-full">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">Checkout</h3>
      <div class="">
        <div class="p-3 rounded-lg">
          <p class="xs:text-sm text-justify xs:text-center">
            Segera lakukan pembayaran dalam 2 jam. Pastikan Anda melakukan transfer hingga
            3 digit terakhir agar memudahkan kami melakukan validasi pembayaran Anda.
          </p>
        </div>

        <div class="rounded-lg mt-2 mx-2 lg:mx-56 p-2 xs:text-sm h-1/3">
          <div class="flex">
            <div class="ml-3 text-left xs:text-sm sm:text-md">
              <p>Tujuan rekening :</p>
            </div>
          </div>
        </div>
        <div
          class="border pl-5 xs:pl-2 rounded-lg mx-2 lg:mx-56 p-2 xs:text-sm h-1/3 bg-indigo-100"
        >
          <div class="flex" style="align-items: center; flex-direction: column">
            <div class="inline-flex">
              <span
                @click.stop.prevent="copyToClipboard(transaction.no_rek_destination)"
                class="cursor-pointer text-3xl font-semibold xs:text-xl"
                >{{ transaction.no_rek_destination }}</span
              >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-5 w-5 self-center xs:h-4 xs:w-4 ml-5 justify-self-center font-semibold cursor-pointer rounded-lg bg-yellow-200"
                @click.stop.prevent="copyToClipboard(transaction.no_rek_destination)"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
                />
              </svg>
            </div>
            <span class="ml-4 text-lg xs:text-md"
              >{{ transaction.bank }} | Alexander Jesse</span
            >
          </div>
          <input type="hidden" id="copy-input" :value="transaction.no_rek_destination" />
        </div>
        <div
          class="border rounded-lg grid grid-cols-2 gap-1 m-2 lg:mx-56 py-3 xs:text-sm"
        >
          <div class="pl-5 xs:pl-2 flex justify-between">
            <span class="font-medium">No. Transaksi</span>
            <span class="mr-5 xs:mr-1">:</span>
          </div>
          <div>
            <span>{{ transaction.no_transaction }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2 flex justify-between">
            <span class="font-medium">Judul Campaign</span>
            <span class="mr-5 xs:mr-1">:</span>
          </div>
          <div>
            <span>{{ campaign.title }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2 flex justify-between">
            <span class="font-medium">Durasi</span>
            <span class="mr-5 xs:mr-1">:</span>
          </div>
          <div>
            <span>{{ campaign.durasi }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2 flex justify-between">
            <span class="font-medium">Nominal</span>
            <span class="mr-5 xs:mr-1">:</span>
          </div>
          <div>
            <span>{{ transaction.nominal | formatRupiah }}</span>
          </div>

          <div class="pl-5 xs:pl-2 flex justify-between">
            <span class="font-medium">Kode Unik</span>
            <span class="mr-5 xs:mr-1">:</span>
          </div>
          <div>
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
              @click.stop.prevent="copyToClipboard(transaction.total_nominal)"
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
              @click.stop.prevent="copyToClipboard(transaction.total_nominal)"
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
            <span class="font-bold">{{ transaction.timeout | formatTime }} WIB</span>
            atau transaksimu akan dibatalkan otomatis oleh sistem
          </p>
          <p class="xs:text-sm text-center xs:text-justify">
            Setelah melakukan pembayaran, kirimkan bukti pembayaran ke
            <span class="font-semibold"
              ><a
                :href="`https://wa.me/${contact_admin}?text=Saya%20ingin%20konfirmasi%20pembayaran%20https://patungin.com/admin/transaction/verification/${transaction.id}`"
                target="_blank"
                noopener norefferer
                >WhatsApp Patungin.com</a
              ></span
            >
            dengan klik tombol dibawah ini.
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
        target="_blank"
        noopener norefferer
        :href="`https://wa.me/${contact_admin}?text=Saya%20ingin%20konfirmasi%20pembayaran%20https://patungin.com/admin/transaction/verification/${transaction.id}`"
      >
        Saya sudah transfer
      </a>
    </div>
    <input type="hidden" id="copy-input" :value="transaction.total_nominal" />
    
  </div>
</template>
<script>
export default {
  name: "CheckoutCampaign",

  data() {
    return {
      contact_admin: "6282266605123",
      campaign: {
        title: null,
        durasi: null,
      },
      user: {
        name: null,
      },
      transaction: {
        nominal: null,
        unique_code: null,
        total_nominal: null,
        bank: null,
        no_transaction: null,
        no_rek_destination: null,
      },
    };
  },
  methods: {
    copyToClipboard(value) {
      var self = this;
      navigator.clipboard.writeText(value).then(
        function () {
          /* clipboard successfully set */
          self.$toast.show({
            title: "Data di salin",
            message: value,
            classToast: "bg-green-500",
            classTitle: "text-white text-xl",
            classMessage: "text-white",
            classClose: "text-green-200",
            classTimeout: "bg-green-600",
            timeout: 2.5,
          });
        },
        function () {
          /* clipboard write failed */
          alert("Oops, unable to copy");
        }
      );
    },
  },
  async created() {
    const { idUser, idCampaign } = this.$route.params;
    await this.$axios
      .$get(`transaction/user/${idUser}/campaign/${idCampaign}`)
      .then((resp) => {
        this.transaction = resp.transactions[0];
        this.campaign = this.transaction.campaigns;
        this.user = this.transaction.users;
        console.log(this.transaction);
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
};
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
