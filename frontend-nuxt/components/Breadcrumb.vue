<template>
  <div aria-label="breadcrumb">
    <ol class="breadcrumb flex">
      <li
        v-for="(item, index) in breadcrumbs"
        :key="index"
        class="capitalize breadcrumb-item text-gray-600"
      >
        <NuxtLink
          :to="item.path + '/'"
          class="text-gray-600 hover:text-indigo-700"
          >{{ item.name }}</NuxtLink
        >
        <!-- <span class="text-gray-600 hover:text-purple-700 mx-2"></span> -->
      </li>
    </ol>
  </div>
</template>

<script>
export default {
  props: ['breadcrumbs'],
  mounted() {},
}
</script>

<style>
.breadcrumb .breadcrumb-item {
  position: relative;
}
.breadcrumb .breadcrumb-item:first-child {
  margin-left: 0 !important;
}
.breadcrumb .breadcrumb-item:not(:last-child):after {
  content: '/';
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}
</style>
