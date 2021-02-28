<template>
  <div class="w-full relative" v-click-outside @clicked-outside="showDetail()">
    <label>Search:</label>
    <input class="form-control" v-model="filters.name.value" />

    <v-table
      :data="campaigns"
      :filters="filters"
      class="w-full text-left flex-wrap xs:block"
      :hideSortIcons="false"
      :currentPage.sync="currentPage"
      :pageSize="2"
      @totalPagesChanged="totalPages = $event"
    >
      <thead slot="head" class="border-t-2 bg-gray-200 py-6">
        <v-th :sortKey="nameLength" defaultSort="desc" class="pl-3 py-2"
          >Nama Campaign</v-th
        >
        <v-th :sortKey="nameLength">Host</v-th>
        <v-th :sortKey="nameLength">Status</v-th>
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
          <td class="px-3 truncate" style="max-width: 150px">{{ row.name }}</td>
          <td class="px-3 truncate" style="max-width: 150px">
            {{ row.host }}
          </td>
          <td class="px-4 py-3 text-xs">
            <span
              class="relative h-full px-3 py-1 font-semibold leading-tight text-center inline-block"
              v-if="row.member == row.gathered"
            >
              <span
                aria-hidden
                class="absolute inset-0 bg-yellow-600 rounded-full"
              ></span>
              <span class="relative text-xs font-bold capitalize text-white m-0"
                >Ready</span
              >
            </span>
            <span v-else class="font-bold text-lg ml-3"
              >{{ row.gathered }}/{{ row.member }}</span
            >
          </td>
          <td class="px-3">{{ row.created | formatDate }}</td>

          <td class="px-3">
            {{ row.expired | formatDate }}
          </td>
          <td class="justify-between px-2 py-2 inline-block relative">
            <div class="inline-flex">
              <a
                class="px-2 py-1 bg-green-400 rounded-md text-sm font-medium text-white hover:bg-green-600 focus:outline-none mr-2 text-center"
                :href="'https://wa.me/62' + row.telp"
                target="_blank"
              >
                WhatsApp</a
              >
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
                class="shadow-md bg-white text-gray-800 border cursor-pointer transform absolute divide-y transition duration-300 ease-in-out mt-10 origin-left z-10 right-0 min-w-auto"
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
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                      />
                    </svg>
                    <span class="text-sm"> Ubah Jadi Expired </span>
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
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                      />
                    </svg>
                    <span class="text-sm"> Ubah Jadi Berlangsung </span>
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
</template>
<script>
export default {
  name: 'CampaignActiveTable',
  data() {
    return {
      activeDetail: null,
      detail: false,
      currentPage: 1,
      totalPages: 3,
      filters: {
        name: { value: '', keys: ['name', 'email'] },
      },
      campaigns: [
        {
          name: 'akun netflix 1 bulan dijamin aman',
          host: 'Elisabeth Olsen',
          member: 5,
          gathered: 1,
          created: new Date(),
          expired: new Date(),
        },
        {
          name: 'akun netflix 1 bulan dijamin aman',
          host: 'Elisabeth Olsen',
          member: 5,
          gathered: 5,
          created: new Date(),
          expired: new Date(),
        },
        {
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
</style>
