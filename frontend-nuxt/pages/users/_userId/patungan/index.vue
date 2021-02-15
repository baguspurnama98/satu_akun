<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    v-click-outside
    @clicked-outside="showDetail()"
  >
    <div class="w-full">
      <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
        Patungan Saya
      </h3>

      <div
        class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 xs:pr-0 lg:px-8"
      >
        <div
          class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-6 rounded-bl-lg rounded-br-lg"
        >
          <table
            class="min-w-full"
            v-click-outside
            @clicked-outside="showDetail()"
          >
            <thead>
              <tr>
                <th
                  class="px-6 xs:px-3 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
                >
                  Nama Campaign
                </th>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"
                >
                  Jumlah Anggota
                </th>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"
                >
                  Status
                </th>
                <th
                  class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"
                >
                  Tanggal Berakhir
                </th>

                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
              </tr>
            </thead>
            <!-- Bingung gimana caranya click-outsidenya berjalan maksimal -->
            <tbody
              class="bg-white"
              v-click-outside
              @clicked-outside="showDetail()"
            >
              <tr
                v-for="(patungan, index) in dataPatungan"
                :key="patungan.title"
                class="hover:bg-gray-100 relative"
              >
                <td
                  class="px-6 xs:px-3 py-4 border-b border-gray-500 overflow-ellipsis overflow-hidden"
                  style="max-width: 300px"
                >
                  <p
                    class="text-sm leading-5 text-gray-800 font-medium line-clampin"
                    style="max-width: 300px"
                  >
                    {{ patungan.title }}
                  </p>
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"
                >
                  <div class="text-sm leading-5 text-blue-900">
                    {{ patungan.member }}/{{ patungan.totalMember }}
                  </div>
                </td>

                <td
                  class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"
                >
                  <span
                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight"
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
                      class="relative text-xs font-bold cursor-pointer capitalize text-white"
                      >{{ patungan.status }}</span
                    >
                  </span>
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5"
                >
                  {{ changeDateFormat(patungan.dateEnd) }}
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5"
                >
                  <div class="group inline-block relative">
                    <button
                      class="items-center px-4 xs:px-3 py-2 border text-blue-500 rounded transition duration-300 focus:outline-none flex font-semibold"
                      @click="showDetail(index)"
                      :disabled="
                        patungan.status == 'pending' ||
                        patungan.status == 'refund'
                      "
                      :class="{
                        'disabled:opacity-50 bg-gray-300 border-gray-500':
                          patungan.status == 'pending' ||
                          patungan.status == 'refund',
                        'border-indigo-500 hover:border-indigo-700':
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
                        class="h-4 w-4 ml-3 z-10"
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
                      class="bg-white text-gray-800 border cursor-pointer rounded transform absolute divide-y transition duration-300 ease-in-out mt-1 origin-left z-50 min-w-auto xs text-left"
                      :class="{
                        '': activeDetail == index,
                        hidden: activeDetail != index,
                      }"
                    >
                      <li
                        class="px-2 py-1 hover:bg-gray-100 w-full border-none"
                      >
                        <div class="inline-flex items-center">
                          <svg
                            class="w-4 h-4 mr-1"
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
                        </div>
                      </li>
                      <li
                        class="px-2 py-1 hover:bg-gray-100 w-full border-none"
                      >
                        <a
                          class="inline-flex items-center"
                          href="https://wa.me/628976634788"
                          target="_blank"
                          ref="non"
                        >
                          <svg
                            class="w-4 h-4 mr-1"
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
  </div>
</template>
<script>
import moment from 'moment'
export default {
  data() {
    return {
      activeDetail: null,
      detail: false,
      dataPatungan: [
        {
          title: 'Sharing Account Netflix 1 Bulan',
          member: 3,
          totalMember: 4,
          status: 'aktif',
          dateEnd: new Date(),
        },
        {
          title: 'Belajar Coding Javascript',
          member: 3,
          totalMember: 4,
          status: 'pending',
          dateEnd: new Date(),
        },
        {
          title:
            'Patungan Beli Akun Dicoding selama 1 tahun bebas kelas apa saja yang ada, yuk murah meriah',
          member: 3,
          totalMember: 4,
          status: 'berlangsung',
          dateEnd: new Date(),
        },
      ],
    }
  },
  methods: {
    showDetail(value) {
      console.log(value)
      if (value === this.activeDetail) {
        this.activeDetail = null
      } else {
        this.activeDetail = value
      }
    },

    changeDateFormat(date) {
      const monthNames = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
      ]
      let dateNew = moment(date).format('DD/MM/YYYY')
      var splitted = dateNew.split('/')
      return `${splitted[0]} ${monthNames[splitted[1] - 1]} ${splitted[2]}`
    },
  },

  // filters: { // untuk dapetin "3 hours ago"
  //   moments(val) {
  //     return moment(val, 'DD/MM/YYYY').fromNow()
  //   },
  // },

  watch: {
    $route(to, from) {
      this.showDetail()
    },
  },
}
</script>
