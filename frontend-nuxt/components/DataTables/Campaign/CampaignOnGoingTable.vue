<template>
  <div>
    <div
      class="w-full relative"
      v-click-outside
      @clicked-outside="showDetail()"
    >
      <label>Search:</label>
      <input class="form-control" v-model="filters.name.value" />

      <v-table
        :data="campaigns"
        :filters="filters"
        class="w-full text-left flex-wrap z-10"
        :hideSortIcons="false"
        :currentPage.sync="currentPage"
        :pageSize="10"
        @totalPagesChanged="totalPages = $event"
      >
        <thead slot="head" class="border-t-2 bg-gray-200 py-6">
          <v-th :sortKey="nameLength" defaultSort="desc" class="pl-3 py-2"
            >Nama Campaign</v-th
          >
          <v-th :sortKey="nameLength">Host</v-th>
          <v-th :sortKey="nameLength">Email Tertaut</v-th>

          <v-th :sortKey="nameLength">Tanggal Pembuatan</v-th>
          <v-th :sortKey="dateSort" defaultSort="desc">Tanggal Kadaluarsa</v-th>
          <th>Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="(row, index) in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3 truncate" style="max-width: 150px">
              {{ row.name }}
            </td>
            <td class="px-3 truncate" style="max-width: 150px">
              {{ row.host }}
            </td>
            <!-- aku tambah informasi email, biar admin tau email suatu campaign dengan mudah -->
            <td class="px-3 truncate" style="max-width: 150px">
              baguspurnama@gmail.com
            </td>
            <td class="px-3">{{ row.created | formatDate }}</td>

            <td class="px-3">
              {{ row.expired | formatDate }}
            </td>
            <td class="justify-between py-2 inline-block relative">
              <div class="inline-flex">
                <button
                  class="items-center px-2 py-1 bg-indigo-400 rounded-md text-sm transition duration-300 text-white hover:bg-indigo-600 focus:outline-none flex font-semibold"
                  @click="showDetail(index)"
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
                  class="shadow-md bg-white text-gray-800 border cursor-pointer transform absolute divide-y transition duration-300 ease-in-out mt-8 origin-left z-50 right-0 min-w-auto"
                  :class="{
                    '': activeDetail == index,
                    hidden: activeDetail != index,
                  }"
                >
                  <li class="px-2 py-2 hover:bg-gray-200 w-full border-none">
                    <a
                      class="inline-flex items-center"
                      href="#"
                      @click="showDetailCampaign()"
                    >
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
                  <li class="px-2 py-2 hover:bg-gray-200 w-full border-none">
                    <a
                      class="inline-flex items-center"
                      :href="'https://wa.me/62' + row.telp"
                      target="_blank"
                    >
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
                          d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"
                        />
                      </svg>
                      <span class="text-sm"> WhatsApp </span>
                    </a>
                  </li>
                  <li class="px-2 py-2 hover:bg-gray-200 w-full border-none">
                    <a
                      class="inline-flex items-center"
                      href="#"
                      @click.prevent="showForm(row.id)"
                    >
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
                          d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                      <span class="text-sm"> Tambah Informasi Akun </span>
                    </a>
                  </li>
                  <li
                    class="px-2 py-2 hover:bg-gray-200 w-full border-none"
                    :class="{
                      '': row.member != row.gathered,
                      hidden: row.member == row.gathered,
                    }"
                  >
                    <a
                      class="inline-flex items-center"
                      href="#"
                      @click="showModal('refund')"
                      ref="non"
                    >
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
                          d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"
                        />
                      </svg>
                      <span class="text-sm"> Proses <b>Refund</b> </span>
                    </a>
                  </li>
                  <li
                    class="px-2 py-2 hover:bg-gray-200 w-full border-none"
                    :class="{
                      '': row.member == row.gathered,
                      hidden: row.member != row.gathered,
                    }"
                  >
                    <a
                      class="inline-flex items-center"
                      href="#"
                      @click="showModal('selesai')"
                    >
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                      <span class="text-sm"> Ubah Jadi <b>Selesai</b> </span>
                    </a>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
        </tbody>
      </v-table>
      <smart-pagination
        :currentPage.sync="currentPage"
        :totalPages="totalPages"
      />
    </div>

    <!-- Modal -->
    <div
      class="container mx-auto flex justify-center justify-items-start items-start w-full absolute z-100 inset-0"
      :class="[modal.status ? '' : 'hidden']"
    >
      <div
        class="bg-white fixed rounded-lg shadow-lg mx-auto xs:mx-5 self-center"
      >
        <div class="w-96 border-t-8 border-indigo-600 rounded-lg flex px-3">
          <div class="w-1/3 pt-6 flex justify-center">
            <svg
              class="w-16 h-16 bg-indigo-600 text-white p-3 rounded-full"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <div class="w-full pt-9 px-4">
            <h3 class="font-bold text-indigo-500 pt-5 capitalize">
              Jadikan {{ modal.text }}
            </h3>
            <p class="py-2 text-sm text-gray-600">
              Yakin lanjutkan proses ini?
            </p>
          </div>
        </div>

        <div class="p-4 flex space-x-4">
          <button
            @click.prevent="showModal('')"
            class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
          >
            Batal
          </button>
          <button
            class="w-1/2 px-4 py-3 text-center text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 hover:text-white font-bold text-sm focus:outline-none"
            @click="handleProccess()"
          >
            Proses
          </button>
        </div>
      </div>
    </div>

    <!-- Modal Form informasi akun -->
    <div
      class="container mx-auto flex justify-center justify-items-start items-start absolute z-100 inset-0"
      :class="[form.status ? '' : 'hidden']"
    >
      <div class="fixed w-1/2 sm:w-2/3 xs:w-full self-center">
        <form class="bg-white rounded-lg shadow-lg mx-auto xs:mx-8">
          <div class="border-t-8 border-indigo-600 rounded-lg px-10 xs:px-5">
            <div class="w-full pt-9 px-4 text-center">
              <h3
                class="font-bold text-indigo-500 pt-5 capitalize text-3xl xs:text-xl sm:text-2xl"
              >
                Form Informasi Akun
              </h3>
            </div>

            <div
              class="py-8 text-base leading-6 text-gray-700 sm:text-md sm:leading-7 xs:text-sm"
            >
              <div class="flex flex-col mb-1">
                <label class="leading-loose text-md">Email</label>
                <!-- <input
                  type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Pilih Email"
                /> -->
                <select
                  class="w-full border focus:outline-none focus:ring focus:border-indigo-400 px-4 py-2 rounded-md sm:text-sm"
                  name="range_period"
                  id="range_period"
                >
                  <option>Pilih...</option>
                  <option value="akun-1-@patungin.com">
                    akun-1-@patungin.com
                  </option>
                  <option value="akun-2-@patungin.com">
                    akun-2-@patungin.com
                  </option>
                  <option value="akun-3-@patungin.com">
                    akun-3-@patungin.com
                  </option>
                </select>
              </div>
              <div class="flex flex-col mb-1">
                <label class="leading-loose text-md">Password</label>
                <input
                  type="text"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Masukan Password"
                />
              </div>
              <div class="flex flex-col mb-1">
                <label class="leading-loose text-md">Deskripsi</label>
                <textarea
                  rows="6"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Masukan Deskripsi Tambahan"
                />
              </div>
              <div class="flex flex-col mb-1">
                <label class="leading-loose text-md">Link Grup WA</label>
                <input
                  type="textarea"
                  row="5"
                  class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                  placeholder="Masukan url link"
                />
              </div>
            </div>
          </div>

          <div class="p-4 flex space-x-4">
            <button
              @click="showForm('')"
              class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
            >
              Batal
            </button>
            <button
              class="w-1/2 px-4 py-3 text-center text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg hover:text-white font-bold text-sm focus:outline-none"
              @click="handleProccess()"
            >
              Proses
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'CampaignActiveTable',
  data() {
    return {
      modal: {
        status: false,
        text: '',
      },
      form: {
        status: false,
        email: '',
        pass: '',
        desc: '',
        urlGroup: '',
      },
      activeDetail: null,
      detail: false,
      currentPage: 1,
      totalPages: 3,
      filters: {
        name: { value: '', keys: ['name', 'email'] },
      },
      campaigns: [
        {
          id: 1,
          name: 'akun netflix 1 bulan dijamin aman',
          host: 'Elisabeth Olsen',
          member: 5,
          gathered: 1,
          created: new Date(),
          expired: new Date(),
        },
        {
          id: 2,
          name: 'akun netflix 1 bulan dijamin aman',
          host: 'Elisabeth Olsen',
          member: 5,
          gathered: 5,
          created: new Date(),
          expired: new Date(),
        },
        {
          id: 3,
          name: 'akun netflix 1 bulan dijamin aman',
          host: 'Elisabeth Olsen',
          member: 5,
          gathered: 3,
          created: new Date(),
          expired: new Date(),
        },
      ],
    }
  },
  methods: {
    nameLength(row) {
      return row.name.length
    },
    dateSort(a, b) {
      let date1 = new Date(a.registered).getTime()
      let date2 = new Date(b.registered).getTime()

      return date1 - date2
    },
    showDetail(value) {
      if (value === this.activeDetail) {
        this.activeDetail = null
      } else {
        this.activeDetail = value
      }
    },
    showModal(text) {
      this.activeDetail = null
      this.modal.status = !this.modal.status
      this.modal.text = text
    },
    showDetailCampaign() {
      alert('open new tab detail campaign by id campaign')
    },
    handleProccess() {
      if (this.modal.text == 'refund') {
        alert('proses post request refund')
      }

      if (this.modal.text == 'selesai') {
        alert('proses post request selesai')
      }
    },
    showForm(id) {
      if (id !== '') {
        alert(id)
        this.activeDetail = null
        this.form.status = !this.form.status
      } else {
        this.form.status = !this.form.status
      }
    },
    saveInfoAccount() {
      alert('post request save info account')
    },
  },
}
</script>
<style>
table {
  overflow-x: scroll;
  white-space: nowrap;
}
svg {
  display: inline-flex !important;
}

ul.pagination {
  display: inline-flex !important;
  margin-top: 10px;
}

.form-control {
  border-radius: 5px;
  border: solid 1px rgb(202, 190, 190);
  padding: 0.3rem 0.8rem;
  margin-bottom: 20px;
}
.form-control:focus {
  outline: none;
}

.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 10px;
  margin-top: 50px !important;
}

.page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6;
}

.page-link:hover {
  background-color: #b2f5ea;
}

.page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
}
.page-item.active .page-link {
  z-index: 1;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}
th {
  cursor: pointer;
}
</style>
