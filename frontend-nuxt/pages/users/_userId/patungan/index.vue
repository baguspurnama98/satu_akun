<template>
  <div
    class="relative container px-4 mx-auto"
  >
    <div class="relative w-full">
      <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
        Patungan Saya
      </h3>

      <div class="relative overflow-auto pb-20">
        <table
          class="relative table-auto w-full text-left whitespace-no-wrap"
        >
          <thead>
            <tr>
              <th
                class="px-4 py-3 title-font tracking-wider font-medium text-gray-600 text-sm bg-gray-100 rounded-tl rounded-bl"
              >
                Nama Campaign
              </th>
              <th
                class="px-4 py-3 title-font tracking-wider font-medium text-gray-600 text-sm bg-gray-100"
              >
                Jumlah Anggota
              </th>
              <th
                class="px-4 py-3 title-font tracking-wider font-medium text-gray-600 text-sm bg-gray-100"
              >
                Status
              </th>
              <th
                class="px-4 py-3 title-font tracking-wider font-medium text-gray-600 text-sm bg-gray-100"
              >
                Tanggal Berakhir
              </th>

              <th
                class="w-10 title-font tracking-wider text-gray-600 text-sm bg-gray-100 rounded-tr rounded-br"
              ></th>
            </tr>
          </thead>
          <!-- Bingung gimana caranya click-outsidenya berjalan maksimal -->
          <tbody
            class="bg-white relative text-sm"
          >
            <tr
              v-for="(patungan, index) in dataPatungan"
              :key="patungan.title"
              class="hover:bg-gray-100 relative"
            >
              <td
                class="border-t-2 border-gray-200 px-4 py-3"
                style="max-width: 200px"
              >
                <p class="text-sm leading-5 text-gray-800 font-medium truncate">
                  {{ patungan.title }}
                </p>
              </td>
              <td class="border-t-2 border-gray-200 px-4 py-3">
                <div class="text-sm leading-5">
                  {{ patungan.member }}/{{ patungan.totalMember }}
                </div>
              </td>

              <td class="border-t-2 border-gray-200 px-4 py-3 text-xs">
                <span
                  class="relative h-full px-3 py-1 font-semibold text-green-900 leading-tight text-center inline-block"
                >
                  <span
                    aria-hidden
                    class="absolute inset-0 bg-red-600 rounded-full"
                    v-if="patungan.status === 'pending'"
                  ></span>
                  <span
                    aria-hidden
                    class="absolute inset-0 bg-gray-700 rounded-full"
                    v-if="patungan.status === 'refund'"
                  ></span>
                  <span
                    aria-hidden
                    class="absolute inset-0 bg-yellow-500 rounded-full"
                    v-if="patungan.status === 'aktif'"
                  ></span
                  ><span
                    aria-hidden
                    class="absolute inset-0 bg-indigo-500 rounded-full"
                    v-if="patungan.status === 'berlangsung'"
                  ></span
                  ><span
                    aria-hidden
                    class="absolute inset-0 bg-green-400 rounded-full"
                    v-if="patungan.status === 'selesai'"
                  ></span>
                  <span
                    class="relative text-xs font-bold capitalize text-white m-0"
                    >{{ patungan.status }}</span
                  >
                </span>
              </td>
              <td class="border-t-2 border-gray-200 px-4 py-3">
                {{ patungan.dateEnd | formatDate }}
              </td>
              <td class="border-t-2 border-gray-200 px-4 py-3">
                <div class="group inline-block relative"
                    v-click-outside
                    @clicked-outside="showDetail()">
                  <button
                    class="items-center px-2 py-1 border bg-white text-indigo-500 rounded transition duration-300 focus:outline-none flex font-semibold"
                    @click="showDetail(index)"
                    :disabled="
                      patungan.status == 'pending' ||
                      patungan.status == 'refund'
                    "
                    :class="{
                      'disabled:opacity-50 bg-gray-300 border-gray-500':
                        patungan.status == 'pending' ||
                        patungan.status == 'refund',
                      'border-indigo-400 hover:border-indigo-700':
                        patungan.status != 'pending' ||
                        patungan.status == 'refund',
                    }"
                  >
                    Detail

                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      class="h-4 w-4 ml-3"
                      :class="{
                        'transform rotate-180 transition duration-500 ease-in-out':
                          activeDetail == index,
                        'transform rotate-0 transition duration-500 ease-in-out':
                          activeDetail != index,
                      }"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <ul
                    class="shadow-md bg-white text-gray-800 border cursor-pointer transform absolute divide-y transition duration-300 ease-in-out mt-1 origin-left z-10 right-0 min-w-auto"
                    :class="{
                      '': activeDetail == index,
                      hidden: activeDetail != index,
                    }"
                  >
                    <li class="px-2 py-2 hover:bg-gray-100 w-full border-none">
                      <a class="inline-flex items-center" href="patungan/1">
                        <svg
                          class="w-4 h-4 mr-2"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                          />
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>
                        <span class="text-sm"> Detail Campaign </span>
                      </a>
                    </li>
                    <li class="px-2 py-2 hover:bg-gray-100 w-full border-none">
                      <a
                        class="inline-flex items-center"
                        href="https://wa.me/628976634788?text=Saya%20ingin%20melaporkan%20campaign%20dengan%20ID:%20ID_Campaign"
                        target="_blank"
                        ref="non"
                      >
                        <svg
                          class="w-4 h-4 mr-2"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="red"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>
                        <span class="text-sm"> Laporkan </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  layout: 'default',

  data() {
    return {
      activeDetail: null,
      detail: false,
      dataPatungan: [
        {
          title: 'Sharing Account Netflix 1 Tahun',
          member: 3,
          totalMember: 4,
          status: 'aktif',
          dateEnd: new Date(),
        },
        {
          title: 'Sharing Account Netflix 3 Bulan',
          member: 4,
          totalMember: 4,
          status: 'selesai',
          dateEnd: new Date(),
        },
        {
          title: 'Sharing Account Netflix 1 Bulan',
          member: 4,
          totalMember: 4,
          status: 'refund',
          dateEnd: new Date(),
        },
        {
          title: 'Belajar Coding Javascript',
          member: 1,
          totalMember: 4,
          status: 'pending',
          dateEnd: new Date(),
        },
        {
          title:
            'Patungan Beli Akun Dicoding selama 1 tahun bebas kelas apa saja yang ada, yuk murah meriah',
          member: 4,
          totalMember: 4,
          status: 'berlangsung',
          dateEnd: new Date(),
        },
      ],
    }
  },
  methods: {
    showDetail(value) {
      if (value === this.activeDetail) {
        this.activeDetail = null
      } else {
        this.activeDetail = value
      }
    },
  },

  watch: {
    $route(to, from) {
      this.showDetail()
    },
  },
}
</script>
