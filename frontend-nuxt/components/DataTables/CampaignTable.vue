<template>
  <div class="w-full">
    <label>Search:</label>
    <input class="form-control" v-model="filters.name.value" />

    <v-table
      :data="campaigns"
      :filters="filters"
      class="w-full text-left wrapper xs:block"
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
          v-for="row in displayData"
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
          <td class="justify-between px-2 py-2">
            <a
              class="px-2 py-1 bg-green-400 rounded-md text-sm font-medium text-white hover:bg-green-600 focus:outline-none mr-2 text-center"
              :href="'https://wa.me/62' + row.telp"
              target="_blank"
            >
              WhatsApp</a
            >
            <button
              class="px-2 py-1 bg-indigo-400 rounded-md text-sm font-medium text-white hover:bg-indigo-600 focus:outline-none"
            >
              Detail
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
</template>
<script>
export default {
  name: 'DataTableUser',
  data() {
    return {
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
