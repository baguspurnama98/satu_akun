<template>
  <div>
    <select
      class="sm:hidden border shadow-md border-gray-200 rounded-full text-gray-700 h-10 pl-5 pr-5 bg-white focus:outline-none appearance-none capitalize"
      @change="goToCategory" v-bind:value="selectedCategory"
    >
      <option value="" disabled selected>Filter Category</option>
      <option
        v-for="category in categories"
        :key="category.id"
        :value="`${category.categories.toLowerCase()}`"
      >
        {{ category.categories }}
      </option>
    </select>
    <NuxtLink
      class="my-1 text-gray-600 capitalize hover:underline sm:mx-3 xs:hidden"
      :to="`${category.categories.toLowerCase()}`"
      v-for="category in categories"
      :key="category.id"
      >{{ category.categories }}</NuxtLink
    >
  </div>
</template>
<script>
export default {
  name: "Category",
  props: ["categories", "goToCategory", "selectedCategory"],
};
</script>
