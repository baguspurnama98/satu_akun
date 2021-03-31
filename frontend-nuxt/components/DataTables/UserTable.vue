<template>
  <div>
    <div
      class="w-full relative z-0"
      v-click-outside
      @clicked-outside="showModalBlock('outside')"
    >
      <label>Search:</label>
      <input class="form-control" v-model="filters.name.value" />

      <v-table
        :data="users"
        :filters="filters"
        class="w-full text-left wrapper xs:block"
        :hideSortIcons="false"
        :currentPage.sync="currentPage"
        :pageSize="10"
        @totalPagesChanged="totalPages = $event"
      >
        <thead slot="head" class="border-t-2 bg-gray-200 py-6">
          <v-th :sortKey="indexChar" defaultSort="asc" class="pl-3 py-2"
            >Nama</v-th
          >
          <v-th :sortKey="nameLength">Email</v-th>
          <v-th :sortKey="nameLength">Telp</v-th>
          <v-th :sortKey="nameLength">Status</v-th>
          <th>Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="row in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3 truncate" style="max-width: 150px">
              {{ row.name }}
            </td>
            <td class="px-3 truncate" style="max-width: 150px">
              {{ row.email }}
            </td>
            <td class="px-3">{{ row.whatsapp }}</td>

            <td class="px-4 py-3 text-xs">
              <span
                class="relative h-full px-3 py-1 font-semibold leading-tight text-center inline-block"
              >
                <span
                  aria-hidden
                  class="bg-red-600 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
                  v-if="row.status === 2"
                  >Terblokir</span
                >
                <span
                  aria-hidden
                  class="bg-yellow-500 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
                  v-if="row.status === 1"
                  >Aktif</span
                ><span
                  aria-hidden
                  class="bg-gray-600 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
                  v-if="row.status === 0"
                  >Non-Aktif</span
                >
              </span>
            </td>
            <td class="justify-between px-2 py-3">
              <a
                class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-sm"
                :href="'https://wa.me/62' + row.whatsapp"
                target="_blank"
              >
                WhatsApp</a
              >

              <button
                class="px-2 py-1 bg-indigo-500 text-sm text-white hover:bg-indigo-600 focus:outline-none text-center rounded-lg mr-2 shadow-md"
                v-if="row.status === 'terblokir'"
              >
                Aktifkan
              </button>
              <button
                class="px-2 py-1 bg-red-500 text-sm text-white hover:bg-red-600 focus:outline-none text-center rounded-lg mr-2 shadow-md"
                v-else
                @click="showModalBlock(row.id)"
              >
                Blokir
              </button>
            </td>
          </tr>
        </tbody>
      </v-table>
      <smart-pagination
        :currentPage.sync="currentPage"
        :totalPages="totalPages"
      />
    </div>
    <!-- Modal Block -->
    <div
      class="container mx-auto flex justify-center justify-items-start items-start w-full absolute z-100 inset-0 -mt-40"
      :class="[modalBlock ? 'hidden' : '']"
    >
      <div
        class="bg-white fixed rounded-lg shadow-lg mx-auto xs:mx-5 self-center"
      >
        <div class="w-96 border-t-8 border-red-600 rounded-lg flex">
          <div class="w-1/3 pt-6 flex justify-center">
            <svg
              class="w-16 h-16 bg-red-600 text-white p-3 rounded-full"
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
          </div>
          <div class="w-full pt-9 pr-4">
            <h3 class="font-bold text-red-500 pt-5">Blokir Akun ?</h3>
            <p class="py-2 text-sm text-gray-600">
              Yakin lakukan pemblokiran terhadap akun ini?
            </p>
          </div>
        </div>

        <div class="p-4 flex space-x-4">
          <button
            @click="showModalBlock('outside')"
            class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
          >
            Batal
          </button>
          <button
            class="w-1/2 px-4 py-3 text-center text-white bg-red-600 rounded-lg hover:bg-red-700 hover:text-white font-bold text-sm focus:outline-none"
            @click="blockUser()"
          >
            Blokir
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'DataTableUser',
  props: ['users'],
  data() {
    return {
      modalBlock: true,
      userSelected: '',
      currentPage: 1,
      totalPages: 3,
      filters: {
        name: { value: '', keys: ['name', 'email'] },
      },
    }
  },
  methods: {
    nameLength(row) {
      return row.name.length
    },

    indexChar(row) {
      return row.name.charCodeAt(0) - 96
    },

    dateSort(a, b) {
      let date1 = new Date(a.registered).getTime()
      let date2 = new Date(b.registered).getTime()
      return date1 - date2
    },

    showModalBlock(id) {
      if (id === 'outside') {
        this.modalBlock = true
        this.userSelected = ''
      } else {
        this.modalBlock = !this.modalBlock
        this.userSelected = id
      }
    },

    blockUser() {
      this.$axios
        .$get(`auth/delete/${this.userSelected}`)
        .then((resp) => {
          console.log(resp)
          // return
        })
        .catch((errors) => {
          console.log(errors)
        })
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
  z-index: 0 !important;
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
