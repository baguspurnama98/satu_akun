<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="flex flex-col mx-4 lg:mx-8 lg:items-center">
    <div class="overflow-x-auto">
      <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden p-2 lg:p-10">
          <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-4 py-3 text-gray-700">Potongan Admin</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Harga Minimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Harga Maksimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Admin Minimum</th>
                <th scope="col" class="px-4 py-3 text-gray-700">Admin Maksimum</th>
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
