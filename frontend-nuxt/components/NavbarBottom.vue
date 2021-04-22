<template>
  <!-- Bottom Navbar -->
  <nav
    id="nav"
    v-click-outside
    class="fixed bottom-0 flex flex-row justify-between w-full bg-indigo-500 appearance-none outline-none text-white md:px-10 text-base z-10"
  >
    <NuxtLink
      exact
      to="/"
      class="appearance-none cursor-default px-3 outline-none ripple hover:bg-indigo-400"
    >
      <div class="flex flex-col py-2 w-20">
        <div class="flex justify-center">
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 25 25"
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth="2"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            />
          </svg>
        </div>
        <span
          class="tracking-wide text-center capitalize anti-xsaliased md:text-base text-sm sm:subpixel-antialiased"
          >beranda</span
        >
      </div>
    </NuxtLink>

    <NuxtLink
      to="/campaign/show/all"
      class="appearance-none cursor-default px-3 outline-none ripple hover:bg-indigo-400"
    >
      <div class="flex flex-col py-2 w-20">
        <div class="flex justify-center">
          <svg
            class="inline-block text-center w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 25 25"
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth="2"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            />
          </svg>
        </div>
        <span
          class="tracking-wide text-center capitalize anti-xsaliased md:text-base text-sm sm:subpixel-antialiased"
          >patungan</span
        >
      </div>
    </NuxtLink>

    <span @click.prevent="toggleButton('navUserOption')">
      <div class="px-3 appearance-none outline-none ripple hover:bg-indigo-400">
        <div class="flex flex-col py-2 w-20">
          <div class="flex justify-center">
            <svg
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 25 25"
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              />
            </svg>
          </div>
          <span
            class="tracking-wide text-center capitalize anti-xsaliased md:text-base text-sm sm:subpixel-antialiased"
            >dashboard</span
          >
        </div>
      </div>
    </span>

    <!-- menu dropup class="bottom-0 origin-top-right absolute left-0 mt-2 -mr-1 w-48 rounded-md shadow-lg"> -->
    <div
      class="origin-top-left absolute right-0 bottom-0 mb-12 mr-2 w-40 min-w-40 rounded-md shadow-lg bg-white border border-gray-200 divide-y divide-gray-300 text-left z-40"
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
          <div class="py-1">
            <NuxtLink
              to="/account/profile"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
              role="menuitem"
              >Profil</NuxtLink
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
          <div class="py-1">
            <a
              href="https://patungin.com:2096/3rdparty/roundcube/"
              target=”_blank” rel="noreferrer noopener"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
              role="menuitem"
              >Webmail
            </a>
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

    <template>
      <!-- bakalan diisi untuk login? -->
    </template>
  </nav>
</template>

<script>
export default {
  name: "NavbarBottom",
  data() {
    return {
      name: null,
      user_role: null,
      toggle: true,
      navLayanan: true,
      navUserOption: true,
    };
  },
  computed: {
    account_login() {
      return this.$store.state.auth.token;
    },
  },
  watch: {
    $route(to, from) {
      this.toggleButton();
    },
  },
  mounted() {
    if (this.account_login) {
      this.user_role = this.$store.state.user.role;
    }
    const nav = document.getElementById("nav");
    // agar event hanya bekerja pada element nav saja
    nav.addEventListener("clicked-outside", (e) => {
      if (e.detail.tag == "nav") {
        this.toggleButton();
      }
    });
  },
  methods: {
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
  },
};
</script>
<style scoped>
a.nuxt-link-active {
}
/* exact link will show the primary color for only the exact matching link */
a.nuxt-link-exact-active {
  color: #fff;
  background-color: #7f9cf5;
}

.ripple {
  background-position: center;
  -webkit-transition: all 0.2s 0s ease;
  -moz-transition: all 0.2s 0s ease;
  -o-transition: all 0.2s 0s ease;
  transition: all 0.2s 0s ease;
}
.ripple:hover {
  transition-delay: 0s;
  background: #7f9cf5 radial-gradient(circle, transparent 1%, #667eea 1%) center/15000%;
}
.ripple:active {
  background-color: #7f9cf5;
  background-size: 100%;
  -webkit-transition: all 0s 0s ease;
  -moz-transition: all 0s 0s ease;
  -o-transition: all 0s 0s ease;
  transition: all 0s 0s ease;
}
</style>
