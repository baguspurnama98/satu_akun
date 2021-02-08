<template>
  <nav
    v-click-outside
    @clicked-outside="toggleButton()"
    class="p-4 sticky w-full z-10 top-0 shadow-lg bg-indigo-500 mb-6"
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div class="flex items-center text-white">
        <NuxtLink
          exact
          to="/"
          class="text-white no-underline hover:text-white hover:no-underline"
        >
          <span class="text-2xl pl-2 font-medium"
            ><i class="em em-grinning"></i>Berpatungan.com</span
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
            class="fill-current h-4 w-4"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Menu</title>
            <path
              v-if="toggle"
              d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
            />
            <path
              v-else
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            />
          </svg>
        </button>
      </div>

      <div
        id="nav-content"
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto pt-6 lg:pt-0 relative"
        v-bind:class="[toggle ? 'hidden' : '']"
      >
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="nav-item relative text-right">
            <button
              class="pl-3 pr-2 py-2 mx-2 my-1 border-0 rounded inline-flex items-center leading-snug text-white text-md font-medium hover:bg-indigo-700 hover:text-gray-100"
              aria-haspopup="true"
              aria-expanded="true"
              @click="toggleButton('navLayanan')"
            >
              <span>Layanan</span>
              <!-- Heroicon name: chevron-down -->
              <svg
                class="ml-1 pt-1 h-5"
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
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Cari Campaign</a
                >
                <a
                  href="/campaign/create"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Buat Campaign</a
                >
              </div>
            </div>
          </li>
          <li class="nav-item relative text-right">
            <button
              class="px-3 py-2 mx-2 my-1 rounded inline-flex items-center leading-snug text-white text-md font-medium hover:bg-indigo-700 hover:text-gray-100"
              href="#pablo"
            >
              <span>Tentang Kami</span>
            </button>
          </li>

          <!-- Profile dropdown -->
          <!-- Jika account login true, maka yang ditampilkan adalah nama yang masuk dan disesuaikan dengan dropdownnya -->
          <li class="nav-item ml-0 mt-2 lg:mt-0 text-right">
            <button
              class="px-6 py-2 md:mx-2 mx-0 rounded inline-flex bg-white hover:bg-yellow-400 hover:text-black"
              type="button"
              @click="toggleButton('navUserOption')"
            >
              <span v-if="account_login">Dashboard</span>
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
                <div class="py-1">
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Campaign Saya</a
                  >
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Riwayat Patungan</a
                  >
                </div>
                <div class="py-1">
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Ubah Profil</a
                  >
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Pengaturan</a
                  >
                </div>
                <div class="py-1">
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Keluar</a
                  >
                </div>
              </template>
              <template v-else>
                <div class="py-1">
                  <NuxtLink
                    exact
                    to="/account/login"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Masuk
                  </NuxtLink>
                  <a
                    exact
                    to="/account/register"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                    role="menuitem"
                    >Daftar</a
                  >
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
import Template from '../../frontend/src/components/Template.vue'
export default {
  components: { Template },
  name: 'Navbar',
  data() {
    return {
      toggle: true,
      navLayanan: true,
      navUserOption: true,
      account_login: false,
    }
  },
  methods: {
    toggleButton(value) {
      switch (value) {
        case 'toggle':
          this.toggle = !this.toggle
          break
        case 'navLayanan':
          this.navUserOption = true
          this.navLayanan = !this.navLayanan
          break
        case 'navUserOption':
          this.navLayanan = true
          this.navUserOption = !this.navUserOption
          break
        default:
          this.navUserOption = true
          this.navLayanan = true
          break
      }
    },
  },
}
</script>
<style scoped>
#nav-content {
  align-items: right;
  text-align: right;
}
</style>
