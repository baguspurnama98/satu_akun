<template>
  <div class="container px-4 mx-auto flex-wrap justify-between min-h-screen relative">
    <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <h3 class="font-bold pb-4 text-4xl xs:text-2xl text-indigo-500">Data User</h3>
    <div class="">
      <DataTableUser :users="users" />
    </div>
  </div>
</template>
<script>
import DataTableUser from "@/components/DataTables/UserTable";
import Breadcrumb from "@/components/Breadcrumb";

export default {
  components: { DataTableUser, Breadcrumb },
  data() {
    return {
      users: [
        {
          name: "Alexander Tobing",
          email: "alex@gmail.com",
          telp: "0234265433",
          status: "aktif",
        },
        {
          name: "Zpri Eka",
          email: "Apri@gmail.com",
          telp: "0234265433",
          status: "terblokir",
        },
        {
          name: "Bagus Purnama Putra",
          email: "bagus@gmail.com",
          telp: "0234265433",
          status: "non-aktif",
        },
      ],
      breadcrumbs: [],
    };
  },

  mounted() {
    const fullPath = this.$route.fullPath;
    const params = fullPath.substring(1).split("/");

    let path = "";
    let crumbs = [];

    params.forEach((param, index) => {
      path = `${path}/${param}`;
      const match = this.$router.match(path);

      //   Jika name route tidak null dan name route belum ada di crumbs
      if (
        match.name !== null &&
        crumbs.map((val) => val.name).indexOf(match.name) === -1
      ) {
        crumbs.push(match);
      }
    });
    this.breadcrumbs = crumbs;
  },
};
</script>
