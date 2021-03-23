<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="flex flex-col mx-4 lg:mx-8 lg:items-center">
    <p class="text-md my-4 container mx-auto">
      Berikut adalah kalkulasi harga yang akan terjadi dalam transaksi patungan kamu.
      Hasil dari kalkulasi otomatis akan ditambahkan pada harga slot yang telah kamu
      tentukan saat membuat campaign, sehingga tidak perlu ada pemotongan lagi. Biaya ini
      sepenuhnya akan digunakan untuk biaya maintenance aplikasi Patungin.
    </p>
    <div class="overflow-x-auto">
      <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden p-2 lg:p-4">
          <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-4 py-3 text-gray-700">Persentase Sumbangan</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Harga Minimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Harga Maksimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Sumbangan Minimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Sumbangan Maksimum</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-3 border border-gray-500">20%</td>
                <td class="px-4 py-3 border border-gray-500">Rp 10.000</td>
                <td class="px-4 py-3 border border-gray-500">Rp 79.999</td>
                <td class="px-4 py-3 border border-gray-500">Rp 2.000</td>
                <td class="px-4 py-3 border border-gray-500">Rp 4.800</td>
              </tr>
              <tr>
                <td class="px-4 py-3 border border-gray-500">6%</td>
                <td class="px-4 py-3 border border-gray-500">Rp 80.000</td>
                <td class="px-4 py-3 border border-gray-500">Rp 499.999</td>
                <td class="px-4 py-3 border border-gray-500">Rp 4.800</td>
                <td class="px-4 py-3 border border-gray-500">Rp 6.500</td>
              </tr>
              <tr>
                <td class="px-4 py-3 border border-gray-500">1,3%</td>
                <td class="px-4 py-3 border border-gray-500" style="white-space: nowrap">
                  Rp 500.000
                </td>
                <td class="px-4 py-3 border border-gray-500">Rp &infin;</td>
                <td class="px-4 py-3 border border-gray-500">Rp 6.500</td>
                <td class="px-4 py-3 border border-gray-500">Rp 9.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <p class="text-md my-8 container mx-auto">
      Misalnya, kamu menentukan harga patungan pada tiap slot kamu adalah 15 ribu, maka
      sesuai data di atas, slot kamu akan dikenakan beban sebesar 20% dari 15 ribu, yang
      berarti 3 ribu rupiah. Kalau kamu menentukan harga patungan 50 ribu rupiah, maka
      slot kamu akan dikenakan beban patungan sebesar 20% dari 50 ribu rupiah, akan tetapi
      karena batas maksimum pada kelompok 1 adalah 4.800 rupiah, maka hanya akan dikenakan
      biaya sebesar 4.800 saja.
    </p>
  </div>
</template>

<script>
import Carousel from "@/components/Carousel/Carousel";

export default {
  layout: "default",
  components: { Carousel },
};
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
