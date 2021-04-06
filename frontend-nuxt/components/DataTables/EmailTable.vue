<template>
  <div>
    <div class="w-full relative z-0">
      <label>Search:</label>
      <input class="form-control" v-model="filters.name.value" />

      <v-table
        :data="data_emails"
        :filters="filters"
        class="w-full text-left wrapper xs:block"
        :hideSortIcons="false"
        :currentPage.sync="currentPage"
        :pageSize="10"
        @totalPagesChanged="totalPages = $event"
      >
        <thead slot="head" class="border-t-2 bg-gray-200 py-6 w-full">
          <v-th :sortKey="indexChar" defaultSort="asc" class="pl-3 py-2"
            >Email</v-th
          >
          <v-th :sortKey="nameLength">Status</v-th>
          <th class="wi-full">Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="row in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3">
              {{ row.email }}
            </td>
            <td class="px-3">
              <span
                class="relative h-full px-3 py-1 font-semibold leading-tight text-center inline-block"
              >
                <span
                  aria-hidden
                  class="bg-yellow-600 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
                  v-if="row.status === 1"
                  >Aktif</span
                >
                <span
                  aria-hidden
                  class="bg-red-600 rounded-full text-xs font-bold capitalize text-white m-0 px-2 py-1"
                  v-if="row.status === 0"
                  >Non-Aktif</span
                >
              </span>
            </td>

            <td class="px-4 py-3 text-xs">
              <div class="inline-flex">
                <button
                  class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-md"
                  @click="showModal(row, 'edit')"
                >
                  <span class="inline-flex">
                    <svg
                      class="h-4 w-4 mr-1"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                      />
                    </svg>

                    Ubah</span
                  >
                </button>
                <button
                  class="px-2 py-1 text-white bg-red-500 hover:bg-red-700 focus:outline-none rounded-lg shadow-md text-md"
                  @click="handleDelete(true, row.id)"
                >
                  <span class="inline-flex">
                    <svg
                      class="h-4 w-4 mr-1"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                      />
                    </svg>
                    Hapus
                  </span>
                </button>
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

    <!-- Modal Delete -->
    <div
      class="container mx-auto flex justify-center justify-items-start items-start w-full absolute z-100 inset-0 -mt-40"
      :class="[modalDelete ? '' : 'hidden']"
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
            @click="handleDelete(false)"
            class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-black font-bold rounded-lg text-sm focus:outline-none"
          >
            Batal
          </button>
          <button
            class="w-1/2 px-4 py-3 text-center text-white bg-red-600 rounded-lg hover:bg-red-700 hover:text-white font-bold text-sm focus:outline-none"
            @click.prevent="deleteEmail(emailSeleted)"
          >
            <span class="inline-flex items-center p-0 m-0">
              <svg
                v-if="loadingDelete"
                class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <circle
                  class="opacity-25"
                  cx="12"
                  cy="12"
                  r="10"
                  stroke="currentColor"
                  stroke-width="4"
                ></circle>
                <path
                  class="opacity-75"
                  fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
              </svg>
              Hapus
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'EmailTable',
  props: ['data_emails', 'showModal', 'deleteEmail', 'loadingDelete'],
  data() {
    return {
      modalDelete: false,
      emailSeleted: null,
      currentPage: 1,
      totalPages: 3,
      filters: {
        name: { value: '', keys: ['email'] },
      },
    }
  },
  methods: {
    nameLength(row) {
      return row.email.length
    },

    indexChar(row) {
      return row.email.charCodeAt(0) - 96
    },

    dateSort(a, b) {
      let date1 = new Date(a.registered).getTime()
      let date2 = new Date(b.registered).getTime()
      return date1 - date2
    },
    handleDelete(status, id) {
      if (status) {
        this.emailSeleted = id
        this.modalDelete = true
      } else {
        this.modalDelete = false
      }
    },
    onClickEdit(data, todo) {
      this.$emit('clicked', data, todo)
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
th {
  cursor: pointer;
  @apply px-2;
}
</style>
