<template>
  <div>
    <div class="w-full relative z-0">
      <!-- <label>Search:</label>
      <input class="form-control" v-model="filters.name.value" /> -->

      <v-table
        :data="transactions"
        :filters="filters"
        class="w-full text-left wrapper xs:block"
        :hideSortIcons="false"
        :currentPage.sync="currentPage"
        :pageSize="10"
        @totalPagesChanged="totalPages = $event"
      >
        <thead slot="head" class="border-t-2 bg-gray-200 py-6 w-full">
          <v-th :sortKey="indexChar" defaultSort="asc" class="pl-3 py-2"
            >Judul Campaign</v-th
          >
          <v-th :sortKey="nameLength">Tanggal</v-th>
          <v-th :sortKey="nameLength">Biaya</v-th>
          <th class="wi-full">Aksi</th>
        </thead>
        <tbody slot="body" slot-scope="{ displayData }">
          <tr
            v-for="row in displayData"
            :key="row.id"
            class="border-t-2 hover:bg-gray-200"
          >
            <td class="px-3">
              {{ row.detail_campaign.title }}
            </td>
            <td class="px-3">
              {{ row.date | formatDate }}
            </td>
            <td class="font-bold text-xl">
              <span class="text-2xl">
                <span v-if="row.status === 1">+</span>
                <span v-else>-</span>
              </span>

              <span>{{ row.nominal | formatRupiah }}</span>
            </td>
            <td class="px-4 py-3 text-xs">
              <div class="inline-flex">
                <a
                  class="px-2 py-1 text-white bg-green-400 hover:bg-green-600 focus:outline-none rounded-lg mr-2 shadow-md text-md"
                  :href="`/campaign/${row.campaign_id}/checkout/${$store.state.user.id}`"
                >
                  <span class="inline-flex font-medium"> Konfirmasi </span>
                </a>
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
  props: ['transactions'],
  data() {
    return {
      currentPage: 1,
      totalPages: 3,
      filters: {
        name: { value: '', keys: ['email'] },
      },
    }
  },
  methods: {
    nameLength(row) {
      return row.detail_campaign.email.length
    },

    indexChar(row) {
      return row.detail_campaign.email.charCodeAt(0) - 96
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
