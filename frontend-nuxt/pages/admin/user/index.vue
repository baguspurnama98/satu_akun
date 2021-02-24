<template>
  <div
    class="container px-4 my-12 mx-auto flex flex-wrap items-center justify-between"
  >
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
