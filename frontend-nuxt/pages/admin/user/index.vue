<template>
  <div
    class="container px-4 my-12 mx-auto flex-wrap justify-between min-h-screen"
  >
    <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
      Data User
    </h3>
    <DataTableUser />
  </div>
</template>
<script>
import DataTableUser from '@/components/DataTables/UserTable'

export default {
  components: { DataTableUser },
  data() {
    return {}
  },
}
</script>
