<template>
  <div class="container px-4 my-12 mx-auto flex-wrap justify-between min-h-screen">
      <breadcrumb :breadcrumbs="breadcrumbs" class="pb-4"></breadcrumb>
    <h3 class="font-bold pb-3 text-4xl xs:text-2xl text-indigo-500">
      Data Campaign Aktif
    </h3>
    <CampaignTable />
  </div>
</template>
<script>
import CampaignTable from "@/components/DataTables/CampaignTable";
import Breadcrumb from '@/components/Breadcrumb';

export default {
  components: { CampaignTable,Breadcrumb },
  data() {
    return {
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
