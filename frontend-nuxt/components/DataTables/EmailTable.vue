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
        <thead slot="head" class="border-t-2 bg-gray-200 py-6 w-full">
          <v-th :sortKey="indexChar" defaultSort="asc" class="pl-3 py-2"
            >Email</v-th
          >
          <v-th :sortKey="nameLength">Status</v-th>
          <th class="wi-full">Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="(row, index) in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3">
              {{ row.email }}
            </td>
            <td class="px-3">
              {{ row.status }}
            </td>

            <td class="px-4 py-3 text-xs">
              <div class="inline-flex">
                <button
                  class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-md"
                  @click="handleEdit(index)"
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
                  @click="handleDelete(index)"
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
  </div>
</template>
<script>
export default {
  name: 'EmailTable',
  props: ['users'],
  data() {
    return {
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
    handleEdit(id) {
      alert('edit email id: ' + id)
    },

    handleDelete(id) {
      alert('delete email id: ' + id)
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
