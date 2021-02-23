<template>
  <div class="w-full relative">
    <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow">
      <table id="data_table" class="stripe hover w-full text-left">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="h-auto">
          <tr v-for="user in users" :key="user.Name">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.telp }}</td>
            <td class="px-4 py-3 text-xs">
              <span
                class="relative h-full px-3 py-1 font-semibold text-green-900 leading-tight text-center inline-block"
              >
                <span
                  aria-hidden
                  class="absolute inset-0 bg-red-600 rounded-full"
                  v-if="user.status === 'terblokir'"
                ></span>

                <span
                  aria-hidden
                  class="absolute inset-0 bg-yellow-500 rounded-full"
                  v-if="user.status === 'aktif'"
                ></span
                ><span
                  aria-hidden
                  class="absolute inset-0 bg-indigo-500 rounded-full"
                  v-if="user.status === 'non-aktif'"
                ></span>
                <span
                  class="relative text-xs font-bold capitalize text-white m-0"
                  >{{ user.status }}</span
                >
              </span>
            </td>
            <td>
              <button
                class="px-2 py-1 bg-indigo-400 rounded-md text-sm font-medium"
              >
                Detail
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import 'datatables.net-responsive'
import 'datatables.net-buttons'
import $ from 'jquery'
import JSZip from 'jszip'
window.JSZip = JSZip

export default {
  name: 'DataTableUser',
  data() {
    return {
      users: [
        {
          name: 'Alexander Tobing',
          email: 'alex@gmail.com',
          telp: '0234265433',
          status: 'aktif',
        },
        {
          name: 'Apri Eka',
          email: 'Apri@gmail.com',
          telp: '0234265433',
          status: 'terblokir',
        },
        {
          name: 'Bagus Purnama',
          email: 'bagus@gmail.com',
          telp: '0234265433',
          status: 'non-aktif',
        },
      ],
      dataTable: null,
    }
  },

  methods: {},
  head() {
    return {
      link: [
        {
          rel: 'stylesheet',
          href:
            'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css',
        },
        {
          rel: 'stylesheet',
          href:
            'https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css',
        },
      ],
    }
  },

  mounted() {
    this.dataTable = $('#data_table')
      .DataTable({
        paging: true,
        scrollY: 400,
        searching: true,
        responsive: true,
      })
      .columns.adjust()
      .responsive.recalc()
  },
}
</script>

<style>
.dataTables_wrapper select,
.dataTables_wrapper .dataTables_filter input {
  color: #4a5568; /*text-gray-700*/
  padding-left: 1rem; /*pl-4*/
  padding-right: 1rem; /*pl-4*/
  padding-top: 0.5rem; /*pl-2*/
  padding-bottom: 0.5rem; /*pl-2*/
  line-height: 1.25; /*leading-tight*/
  border-width: 2px; /*border-2*/
  border-radius: 0.25rem;
  border-color: #edf2f7; /*border-gray-200*/
  background-color: #edf2f7; /*bg-gray-200*/
}

/*Row Hover*/
table.dataTable.hover tbody tr:hover,
table.dataTable.display tbody tr:hover {
  background-color: #ebf4ff; /*bg-indigo-100*/
}

/*Pagination Buttons*/
.dataTables_wrapper .dataTables_paginate .paginate_button {
  font-weight: 700; /*font-bold*/
  border-radius: 0.25rem; /*rounded*/
  border: 1px solid transparent; /*border border-transparent*/
}

/*Pagination Buttons - Current selected */
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
  color: #fff !important; /*text-white*/
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); /*shadow*/
  font-weight: 700; /*font-bold*/
  border-radius: 0.25rem; /*rounded*/
  background: #667eea !important; /*bg-indigo-500*/
  border: 1px solid transparent; /*border border-transparent*/
  cursor: pointer !important;
}

/*Pagination Buttons - Hover */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  color: #fff !important; /*text-white*/
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); /*shadow*/
  font-weight: 700; /*font-bold*/
  border-radius: 0.25rem; /*rounded*/
  background: #667eea !important; /*bg-indigo-500*/
  border: 1px solid transparent; /*border border-transparent*/
  cursor: pointer !important;
}

/*Add padding to bottom border */
table.dataTable.no-footer {
  border-bottom: 1px solid #e2e8f0; /*border-b-1 border-gray-300*/
  margin-top: 0.75em;
  margin-bottom: 0.75em;
}

/*Change colour of responsive icon*/
table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before,
table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
  background-color: #667eea !important; /*bg-indigo-500*/
}
</style>
