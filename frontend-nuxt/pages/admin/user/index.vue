<template>
  <div
    class="container px-4 my-12 mx-auto flex flex-wrap items-center justify-between"
  >
    <DataTableUser />
    <!-- untuk datatable masih belum ya, aku udh coba2 tp blm berhasil.. jgn dikerjain dulu ya, biar aku aja yg buat hehe -->
  </div>
</template>
<script>
import DataTableUser from '@/components/DataTables/UserTable'

export default {
  components: { DataTableUser },
  data() {
    return {
      columns: [
        {
          label: 'ID',
          name: 'id',
          orderable: true,
        },
        {
          label: 'Name',
          name: 'name',
          orderable: true,
        },

        {
          label: 'Email',
          name: 'email',
          orderable: true,
        },
      ],
    }
  },
}
</script>
