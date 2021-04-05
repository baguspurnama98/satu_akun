<template>
  <nav
    id="nav"
    class="p-3 sticky w-full z-50 top-0 shadow-lg bg-indigo-500"
    v-click-outside
  >
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
      <div class="flex items-center text-white">
        <NuxtLink
          exact
          to="/"
          class="text-white no-underline hover:text-white hover:no-underline"
        >
          <span class="text-2xl pl-2 tracking-wide logo"
            ><i class="em em-grinning"></i>Patungin.com</span
          >
        </NuxtLink>
      </div>

      <div class="block lg:hidden">
        <button
          v-on:click="toggleButton('toggle')"
          id="nav-toggle"
          class="flex items-center px-3 py-2 border rounded bg-white border-gray-100 hover:text-indigio-600 hover:border-white"
        >
          <svg
            class="fill-current h-4 w-4 text-black"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Menu</title>
            <path v-if="toggle" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            <path
              v-else
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            />
          </svg>
        </button>
      </div>

      <div
        id="nav-content"
        @click.prevent="clickInNav"
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto pt-6 lg:pt-0 relative"
        v-bind:class="[toggle ? 'hidden' : '']"
      >
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="nav-item relative text-right">
            <button
              class="pl-3 pr-2 py-2 mx-2 my-1 border-0 rounded inline-flex items-center leading-snug text-white text-md hover:bg-indigo-700 hover:text-gray-100"
              aria-haspopup="true"
              aria-expanded="true"
              @click="toggleButton('navLayanan')"
            >
              <span>Layanan</span>
              <!-- Heroicon name: chevron-down -->
              <svg
                class="ml-1 pt-1 h-5 text-white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>

            <div
              class="origin-top-right absolute right-0 mt-2 w-40 rounded shadow-xl bg-white divide-y divide-gray-300 text-left z-50"
              v-bind:class="[navLayanan ? 'hidden' : '']"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="options-menu"
            >
              <div class="py-1">
                <NuxtLink
                  to="/campaign/show/all"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Cari Campaign</NuxtLink
                >
                <NuxtLink
                  to="/campaign/create"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Buat Campaign</NuxtLink
                >
              </div>
            </div>
          </li>
          <li class="nav-item relative text-right">
            <NuxtLink
              class="px-3 py-2 mx-2 my-1 rounded inline-flex items-center leading-snug text-white text-md hover:bg-indigo-700 hover:text-gray-100"
              to="#"
            >
              <span>Tentang Kami</span>
            </NuxtLink>
          </li>

          <!-- Profile dropdown -->
          <!-- Jika account login true, maka yang ditampilkan adalah nama yang masuk dan disesuaikan dengan dropdownnya -->
          <li class="nav-item ml-0 mt-2 lg:mt-0 text-right">
            <button
              class="px-6 py-2 md:mx-2 mx-0 rounded inline-flex bg-white hover:bg-yellow-400 hover:text-black"
              type="button"
              @click="toggleButton('navUserOption')"
            >
              <span v-if="account_login && user_role === 'u'">{{ getName }}</span>
              <span v-else-if="account_login && user_role === 'a'">{{ getName }}</span>
              <span v-else>Masuk</span>
            </button>
            <div
              class="origin-top-right absolute right-0 mt-2 w-40 rounded shadow-xl bg-white divide-y divide-gray-300 text-left"
              v-bind:class="[navUserOption ? 'hidden' : '']"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="user-menu"
            >
              <template v-if="account_login">
                <!-- Menu untuk User -->
                <template v-if="user_role === 'u'">
                  <div class="py-1">
                    <NuxtLink
                      :to="`/users/${this.$store.state.user.id}/campaign/`"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                      role="menuitem"
                      >Campaign Saya
                    </NuxtLink>
                    <NuxtLink
                      :to="`/users/${this.$store.state.user.id}/patungan/`"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                      role="menuitem"
                      >Patungan Saya
                    </NuxtLink>
                  </div>
                  <div class="py-1">
                    <NuxtLink
                      :to="`/users/${this.$store.state.user.id}/transaction/`"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                      role="menuitem"
                      >Riwayat Transaksi</NuxtLink
                    >
                  </div>
                </template>

                <!-- Menu untuk Admin -->
                <template v-if="user_role === 'a'">
                  <div class="py-1">
                    <NuxtLink
                      to="/admin/"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                      role="menuitem"
                      >Dashboard
                    </NuxtLink>
                  </div>
                </template>

                <div class="py-1">
                  <span
                    @click="logout"
                    class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-red-200 hover:text-gray-900"
                    role="menuitem"
                    >Keluar</span
                  >
                </div>
              </template>

              <template v-else>
                <div class="py-1">
                  <NuxtLink
                    to="/account/login"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Masuk
                  </NuxtLink>
                  <NuxtLink
                    to="/account/register"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-200 hover:text-gray-900"
                    role="menuitem"
                    >Daftar
                  </NuxtLink>
                </div>
              </template>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      toggle: true,
      navLayanan: true,
      navUserOption: true,
      name: null,
      user_role: null,
    };
  },
  computed: {
    account_login() {
      return this.$store.state.auth.token;
    },
    getName() {
      const name = this.$store.state.user.name || "";
      var firstName = name.split(" ")[0];
      return firstName;
    },
  },
  methods: {
    clickInNav(e) {
      if (e.target.localName !== "ul" && e.target.localName !== "li") return;
      this.navLayanan = true;
      this.navUserOption = true;
    },
    toggleButton(value) {
      switch (value) {
        case "toggle":
          this.toggle = !this.toggle;
          this.navUserOption = true;
          this.navLayanan = true;
          break;
        case "navLayanan":
          this.navUserOption = true;
          this.navLayanan = !this.navLayanan;
          break;
        case "navUserOption":
          this.navLayanan = true;
          this.navUserOption = !this.navUserOption;
          break;
        default:
          (this.toggle = true), (this.navUserOption = true);
          this.navLayanan = true;
          break;
      }
    },

    logout() {
      this.$axios
        .$get("auth/logout")
        .then((resp) => {
          this.$store.dispatch("auth/logout");
          this.$store.dispatch("delUserProfile");
          this.$router.replace("/");
        })
        .catch((errors) => {
          console.dir(errors);
        });
    },
  },
  watch: {
    $route(to, from) {
      this.toggleButton();
    },
  },
  mounted() {
    const nav = document.getElementById("nav");
    // agar event hanya bekerja pada element nav saja
    nav.addEventListener("clicked-outside", (e) => {
      if (e.detail.tag == "nav") {
        this.toggleButton();
      }
    });

    if (this.account_login) {
      this.user_role = this.$store.state.user.role;
    }
  },
};
</script>
<style scoped>
#nav-content {
  align-items: right;
  text-align: right;
}
</style>
