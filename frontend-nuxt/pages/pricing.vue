<template>
  <div class="flex flex-col items-center">
    <!-- Content disini -->
    <div class="rounded-t-xl overflow-hidden p-10">
      <table class="table-auto">
        <thead>
          <tr>
            <th class="px-4 py-2 text-emerald-600">Title</th>
            <th class="px-4 py-2 text-emerald-600">Author</th>
            <th class="px-4 py-2 text-emerald-600">Views</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">Intro to CSS</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">Adam</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">858</td>
          </tr>
          <tr class="bg-emerald-200">
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">Adam</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">112</td>
          </tr>
          <tr>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">Intro to JavaScript</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">Chris</td>
            <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">1,280</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Tata cara pembayaran di sini -->
    <Carousel />

  </div>
</template>

<script>
import Carousel from '@/components/Carousel/Carousel'

export default {
  layout: 'default',
  components: { Carousel },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
