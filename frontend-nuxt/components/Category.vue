<template>
  <div>
    <select
      class="sm:hidden border shadow-md border-orange-200 rounded-full text-gray-700 h-10 pl-5 pr-5 bg-white focus:outline-none appearance-none capitalize"
      @change="goToCategory" v-model="selected_category"
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
  computed: {
      /**
       * gunakan computed dan v-model agar terhindar dari caching nuxtlink
       */
      selected_category: {
        get() { return this.selectedCategory },
        set(category) { }
      }
  },
  mounted() {
      console.log(this.selectedCategory)
  },
};
</script>

<style scoped>
a.nuxt-link-exact-active {
  font-weight: bold;
  color: #667eea
}
</style>