<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div class="m-3 w-full">
      <h3 class="font-bold py-3 text-xl">Checkout</h3>
      <div class="">
        <div class="bg-blue-100 p-3 rounded-lg">
          <p class="xs:text-xs text-center">
            Segera lakukan pembayaran agar proses pendaftaran Anda valid.<br />
            Pastikan Anda melakukan transfer hingga 3 digit terakhir untuk
            memudahkan kami melakukan validasi pembayaran Anda.
          </p>
        </div>

        <div
          class="border rounded-lg grid grid-cols-2 my-5 mx-56 xs:mx-0 py-3 xs:text-xs"
        >
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Provider/PLatform</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>Netflix</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Judul Campaign</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>1 Bulan Netflix</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Durasi</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>1 Bulan </span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Nominal</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>{{ formatRupiah(price, 'Rp. ') }}</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Kode Unik</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>234</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Bank Tujuan</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>BCA</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Nomor Rekening</span>
          </div>
          <div class="inline-flex items-center">
            <span class="mr-6">:</span>
            <span>12354453234675</span>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-4 w-4 xs:h-3 xs:w-3 ml-1 justify-self-center font-semibold cursor-pointer rounded-lg bg-yellow-200"
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
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Nama Rekening</span>
          </div>
          <div>
            <span class="mr-5">:</span>
            <span>PT. Berpatungan</span>
          </div>
          <!--  -->
          <div class="pl-5 xs:pl-2">
            <span class="font-semibold">Total Pembayaran</span>
          </div>
          <div class="inline-flex items-center">
            <span class="mr-6">:</span>
            <span>{{ formatRupiah(total, 'Rp. ') }}</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-4 w-4 xs:h-3 xs:w-3 ml-1 justify-self-center font-semibold cursor-pointer rounded-lg bg-yellow-200"
              @click.stop.prevent="copyToClipboard"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
              />
            </svg>
            <input type="hidden" id="testing-code" :value="total" />
          </div>
        </div>

        <div class="bg-blue-100 p-3 rounded-lg">
          <p class="xs:text-xs text-center">
            Segera lakukan pembayaran sebelum pukul
            <span class="font-bold">14.00</span>
          </p>
          <p class="xs:text-xs text-center">
            Setelah melakukan pembayaran, kirimkan bukti pembayaran ke WhatsApp
            Berpatungan.com
          </p>
        </div>
      </div>
    </div>

    <div class="w-full text-center my-5 md:my-10">
      <button
        class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
        type="submit"
      >
        Saya sudah transfer
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Checkout_Campaign',

  data() {
    return {
      price: '53000',
      total: '53234',
    }
  },
  methods: {
    copyToClipboard() {
      let testingCodeToCopy = document.querySelector('#testing-code')
      testingCodeToCopy.setAttribute('type', 'text') // 不是 hidden 才能複製
      testingCodeToCopy.select()

      try {
        var successful = document.execCommand('copy')
        var msg = successful ? 'successful' : 'unsuccessful'
        alert('copied ' + msg)
      } catch (err) {
        alert('Oops, unable to copy')
      }

      /* unselect the range */
      testingCodeToCopy.setAttribute('type', 'hidden')
      window.getSelection().removeAllRanges()
    },

    formatRupiah(angka, prefix) {
      var number_string = String(angka)
          .replace(/[^,\d]/g, '')
          .toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi)

      if (ribuan) {
        let separator = sisa ? '.' : ''
        rupiah += separator + ribuan.join('.')
      }

      rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah
      return prefix === undefined ? rupiah : rupiah ? 'Rp. ' + rupiah : ''
    },
  },
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
