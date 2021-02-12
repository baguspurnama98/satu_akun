<template>
  <div class="lg:w-2/3 w-4/5 mx-auto ">
    <!-- Content disini -->
    <h3 class="font-bold py-3 text-4xl text-indigo-500">Daftar Campaign</h3>
    <div class="overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Judul</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Pengguna Aktif</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Dana Terkumpul</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Status</th>
            <th class="w-10 title-font tracking-wider text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
          </tr>
        </thead>
        <tbody>
            <tr v-for="item in campaigns" :key="item.title">
                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.title }}</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.slot }}</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.dana_terkumpul }}</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">{{ item.status }}</td>
                <td class="border-t-2 border-gray-200 w-10 text-center">
                    <div class="flex-auto flex space-x-3">
                        <!-- ini untuk ngedit -->
                        <a v-if="item.status == 'aktif'" class="w-1/3 py-1 px-2 flex items-center justify-center rounded-md bg-indigo-500 text-white cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!-- ini utk lihat campaign (ketika sudah berlangsung) -->
                        <a v-if="item.status != 'aktif'" class="w-1/3 py-1 px-2 flex items-center justify-center rounded-md bg-indigo-500 text-white cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!-- ini untuk request pembatalan host -->
                        <a v-if="item.status == 'aktif'" class="w-1/3 py-1 px-2 flex items-center justify-center rounded-md bg-red-500 text-white cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Template from '../../../../../frontend/src/components/Template.vue'

export default {
    // title ini harus di truncate
  components: { Template },
  layout: 'default',
  data() {
      return {
          campaigns: [
              { 
                  title: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                  slot: '3/5',
                  dana_terkumpul: 'Rp 400.000',
                  status: 'aktif',
              },
              {
                  title: 'Ut enim ad minim veniam, quis nostrud exercitation.',
                  slot: '4/5',
                  dana_terkumpul: 'Rp 500.000',
                  status: 'expired',
              },
              {
                  title: 'Duis aute irure dolor in reprehenderit in voluptate.',
                  slot: '5/5',
                  dana_terkumpul: 'Rp 300.000',
                  status: 'berlangsung',
              }
          ]
      }
  },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
