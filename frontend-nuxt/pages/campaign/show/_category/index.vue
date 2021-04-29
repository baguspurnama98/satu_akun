<template>
  <div class="container px-4 my-5 mx-auto flex-wrap justify-between min-h-screen">
    <header>
      <div class="container mx-auto py-3">
        <!-- Kategori -->
        <div class="flex items-center justify-between">
          <div class="w-full text-gray-700 text-center text-2xl font-semibold">
            Kategori Campaign
          </div>
        </div>
        <nav class="flex justify-center items-center text-center mt-4">
          <!-- seamless search -->
          <div class="flex flex-col sm:flex-row">
            <category
              :categories="categories"
              :go-to-category="goToCategory"
              :selected-category="$route.params.category"
            ></category>
          </div>
        </nav>
        <!--  -->

        <div
          class="flex relative items-center bg-gray-100 text-black my-5 lg:w-3/4 sm:mb-5 sm:w-full mx-auto rounded-full shadow-lg"
        >
          <input
            class="rounded-l-full w-full py-3 px-3 mx-3 text-gray-700 bg-gray-100 leading-tight text-lg focus:outline-none"
            id="search"
            type="search"
            v-model="keywords"
            placeholder="Cari apa? contoh: Netflix, Udemy"
          />

          <div class="p-2">
            <span
              class="bg-indigo-400 text-white rounded-full p-2 hover:bg-indigo-500 focus:outline-none w-12 h-12 flex items-center justify-center"
            >
              <svg
                class="h-4 w-4 fill-current focus:outline-none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                id="Capa_1"
                x="0px"
                y="0px"
                viewBox="0 0 56.966 56.966"
                style="enable-background: new 0 0 56.966 56.966"
                xml:space="preserve"
                width="512px"
                height="512px"
              >
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </header>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 md:gap-6 gap-4 mt-10">
      <CardCampaign v-for="(campaign, id) in campaigns" :key="id" :campaign="campaign" />
    </div>
    <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler">
      <div slot="no-results"></div>
      <div slot="no-more"></div>
    </infinite-loading>
  </div>
</template>
<script>
import CardCampaign from "@/components/Campaign/CardCampaign";
import Category from "@/components/Category";
import InfiniteLoading from "vue-infinite-loading";

export default {
  layout: "default",
  components: { CardCampaign, Category, InfiniteLoading },
  data() {
    return {
      keywords: "",
      campaigns: [],
      categories: [],
      page: 1,
      infiniteId: +new Date(),
    };
  },
  computed: {
    account_login() {
      return this.$store.state.auth.token;
    },
  },
  methods: {
    //   <button @click="$fetch">Refresh</button>
    refresh() {
      this.$fetch();
    },
    getCampaign: function (keyword = null) {
      //   always reset
      this.page = 1;
      this.infiniteId += 1;

      let category = this.$route.params.category;
      let url = `campaign`;
      if (keyword !== null) url = `campaign?search=${keyword}`;
      if (category != "all")
        url =
          keyword === null
            ? `campaign?category=${category}`
            : `${url}&category=${category}`;
      this.$axios
        .$get(url, {
          params: {
            page: this.page,
          },
        })
        .then((resp) => {
          if (resp.campaigns) {
            this.campaigns = resp.campaigns;   
            this.page += 1;
          }
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },

    /**
     * guard clause, jika belum di render data pertama (page 1) maka ini di hold dulu
     * https://peachscript.github.io/vue-infinite-loading/guide/use-with-filter-or-tabs.html
     * ini di trigger pada saat element infinite-loading terlihat pada viewport
     */
    infiniteHandler($state) {
      if (this.page === 1) {
          this.infiniteId += 1;
          return
      }
      let category = this.$route.params.category;
      let url = `campaign`;
      if (this.keywords !== "") url = `campaign?search=${this.keywords}`;
      if (category != "all")
        url =
          this.keywords === ""
            ? `campaign?category=${category}`
            : `${url}&category=${category}`;
      this.$axios
        .$get(url, {
          params: {
            page: this.page,
          },
        })
        .then((resp) => {
          if (resp.campaigns && resp.campaigns.length > 0) {
            this.page += 1;
            this.campaigns.push(...resp.campaigns);
            $state.loaded();
          } else {
            $state.complete();
          }
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },

    // pelajari tentang debounce
    debounce(func, wait, immediate) {
      var timeout;
      return function () {
        var context = this,
          args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          timeout = null;
          if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
      };
    },

    goToCategory(event) {
      this.$router.push(event.target.value);
    },
  },
  watch: {
    keywords: function (value) {
      if (value.length === 0) {
        this.refresh();
      }
      if (value.length <= 1) {
        return;
      }
      this.debounce(this.getCampaign(value), 300);
    },
  },
  created() {
    this.$axios
      .$get("campaign/categories")
      .then((resp) => {
        this.categories = [{ categories: "all" }, ...resp.categories];
      })
      .catch((errors) => {
        console.log(errors);
      });
  },
  //   https://nuxtjs.org/docs/2.x/components-glossary/pages-fetch
  fetch() {
    this.getCampaign();
  },
};
</script>
