<template>
  <div
    class="container px-4 my-12 mx-auto flex-wrap justify-between min-h-screen relative"
  >
    <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
      Data User
    </h3>
    <div class="">
      <DataTableUser :users="users" />
    </div>
  </div>
</template>
<script>
import DataTableUser from '@/components/DataTables/UserTable'

export default {
  components: { DataTableUser },
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
          name: 'Zpri Eka',
          email: 'Apri@gmail.com',
          telp: '0234265433',
          status: 'terblokir',
        },
        {
          name: 'Bagus Purnama Putra',
          email: 'bagus@gmail.com',
          telp: '0234265433',
          status: 'non-aktif',
        },
      ],
    }
  },
}
</script>
