<template>
  <div>
    <div class="w-full relative z-0" v-click-outside>
      <label>Search:</label>
      <input class="form-control" v-model="filters.name.value" />

      <v-table
        :data="campaigns"
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
          <v-th :sortKey="nameLength">Biaya</v-th>
          <v-th :sortKey="nameLength">Total Terkumpul</v-th>
          <v-th :sortKey="nameLength">Total Pencairan</v-th>
          <v-th :sortKey="nameLength">Status Pencairan</v-th>
          <th>Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="row in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3 truncate" style="max-width: 200px">
              {{ row.title }}
            </td>
            <td class="px-3">
              {{ (row.slot_price * row.slot_capacity) | formatRupiah }}
            </td>
            <td class="px-3">
              {{ row.total_receive | formatRupiah }}
            </td>
            <td class="px-3">{{ row.total_disburse | formatRupiah }}</td>

            <td class="px-4 py-3 text-xs">
              <span
                class="relative h-full px-3 py-1 font-semibold leading-tight text-center inline-block"
                v-if="row.total_disburse !== null"
              >
                <span
                  aria-hidden
                  class="bg-indigo-600 rounded-full px-2 py-1 text-sm text-white"
                  v-if="(row.total_receive / row.total_disburse) * 100 === 50"
                  >50%</span
                >
                <span
                  aria-hidden
                  class="bg-indigo-700 rounded-full px-2 py-1 text-sm text-white"
                  v-if="(row.total_receive / row.total_disburse) * 100 === 75"
                  >75%</span
                >
                <span
                  aria-hidden
                  class="bg-indigo-800 rounded-full px-2 py-1 text-sm text-white"
                  v-if="(row.total_receive / row.total_disburse) * 100 === 100"
                  >100%</span
                >
              </span>
              <span v-else>
                <span
                  aria-hidden
                  class="bg-indigo-600 rounded-full px-2 py-1 text-sm text-white"
                  >0%</span
                >
              </span>
            </td>
            <td class="justify-between px-2 py-3">
              <a
                class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-sm"
                :href="`campaign/${row.id}`"
              >
                Detail</a
              >
            </td>
          </tr>
        </tbody>
      </v-table>
      <smart-pagination
        :currentPage.sync="currentPage"
        :totalPages="totalPages"
        class="flex justify-end"
      />
    </div>
  </div>
</template>
<script>
export default {
  name: 'PaymentTable',
  props: ['campaigns'],
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
      return row.title.charCodeAt(0) - 96
    },

    dateSort(a, b) {
      let date1 = new Date(a.registered).getTime()
      let date2 = new Date(b.registered).getTime()
      return date1 - date2
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
