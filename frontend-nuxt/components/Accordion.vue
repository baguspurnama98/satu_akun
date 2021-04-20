<template>
  <div class="m-4">
    <!-- <h1 class="font-medium max-w-2xl mx-auto pt-10 pb-4">FAQ</h1> -->

    <div class="bg-white border-t border-l border-r border-gray-300">
      <ul class="shadow-box">
        <li
          class="relative border-b border-gray-300"
          v-for="(item, index) in data"
          :key="index"
        >
          <button
            type="button"
            class="w-full px-4 py-4 text-left"
            @click.prevent="selected !== index ? setSelected(index) : setSelected(null)"
          >
            <div class="flex items-center justify-start">
              <div class="pr-4 mt-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="100%"
                  height="100%"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-chevron-down w-5 h-5"
                >
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </div>
              <span> {{ item.title }} </span>
            </div>
          </button>
          <transition
            enter-active-class="duration-200"
            enter-class="opacity-50"
            enter-to-class="opacity-100"
            mode="out-in"
          >
            <div class="relative overflow-hidden shadow-md" v-if="selected === index">
              <div class="p-6">
                <p>
                  {{ item.content }}
                </p>
              </div>
            </div>
          </transition>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "data"],
  data() {
    return {
      selected: null,
    //   Struktur data harus seperti ini
    //   data: [
    //     {
    //       title: "Tailwind CSS is awesome!",
    //       content:
    //         "Tailwind CSS is a highly customizable, low-level CSS framework that gives you all of the building blocks you need to build bespoke designs without any annoying opinionated styles you have to fight to override.",
    //     },
    //     {
    //       title: "Vue.js too!",
    //       content:
    //         "Vue is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with modern tooling and supporting libraries.",
    //     },
    //     {
    //       title: "Download VueTailwindAccordion on NPM now!",
    //       content:
    //         "Relied upon by more than 11 million developers worldwide, npm is committed to making JavaScript development elegant, productive, and safe. The free npm Registry has become the center of JavaScript code sharing, and with more than one million packages, the largest software registry in the world. Our other tools and services take the Registry, and the work you do around it, to the next level. ",
    //     },
    //   ],
    };
  },
  methods: {
    setSelected(index) {
      console.log(index);
      this.selected = index;
    },
  },
};
</script>

<style scoped>
.max-h-0 {
  max-height: 0;
}
</style>
