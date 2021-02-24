<template>
  <div class="w-full">
    <label>Filter:</label>
    <input class="form-control" v-model="filters.name.value" />
    <!-- Tablenya masih belum rapi ya, nanti aku rapiin stylingnya -->
    <v-table
      :data="users"
      :filters="filters"
      class="w-full"
      :hideSortIcons="false"
      :currentPage.sync="currentPage"
      :pageSize="2"
      @totalPagesChanged="totalPages = $event"
    >
      <thead slot="head">
        <v-th :sortKey="nameLength" defaultSort="desc">Nama</v-th>
        <v-th :sortKey="nameLength">Email</v-th>
        <v-th :sortKey="nameLength">Telp</v-th>
        <v-th :sortKey="nameLength">Status</v-th>
        <th>Aksi</th>
      </thead>
      <tbody slot="body" slot-scope="{ displayData }">
        <tr v-for="row in displayData" :key="row.id">
          <td>{{ row.name }}</td>
          <td>{{ row.email }}</td>
          <td>{{ row.telp }}</td>

          <td class="px-4 py-3 text-xs">
            <span
              class="relative h-full px-3 py-1 font-semibold text-green-900 leading-tight text-center inline-block"
            >
              <span
                aria-hidden
                class="absolute inset-0 bg-red-600 rounded-full"
                v-if="row.status === 'terblokir'"
              ></span>

              <span
                aria-hidden
                class="absolute inset-0 bg-yellow-500 rounded-full"
                v-if="row.status === 'aktif'"
              ></span
              ><span
                aria-hidden
                class="absolute inset-0 bg-indigo-500 rounded-full"
                v-if="row.status === 'non-aktif'"
              ></span>
              <span
                class="relative text-xs font-bold capitalize text-white m-0"
                >{{ row.status }}</span
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
svg {
  display: inline-flex !important;
}

ul.pagination {
  display: inline-flex !important;
  margin-top: 10px;
}

.form-control {
  border-radius: 10px;
  border: solid 1px rgb(202, 190, 190);
  padding: 0.3rem 0.8rem;
  margin-bottom: 20px;
}
.form-control:focus {
  outline: none;
}
</style>
