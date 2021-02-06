<template>
  <nav
    class="p-2 sticky w-full z-10 top-0 shadow-lg bg-indigo-500"
    v-click-outside
    @clicked-outside="toggleButton()"
  >
    <div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button
            class="relative inline-flex items-center justify-center ml-2 p-2 rounded-md text-gray-400 hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            @click="toggleButton('toggle')"
          >
            <span class="sr-only">Menu</span>
            <svg
              class="block h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>

            <svg
              class="hidden h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>

        <div
          class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start"
        >
          <div class="flex-shrink-0 flex items-center text-white">
            <NuxtLink
              exact
              to="/"
              class="text-white no-underline hover:text-white hover:no-underline"
            >
              <span class="pl-2 text-2xl font-medium">Bisa Patungan</span>
            </NuxtLink>
          </div>
        </div>

        <div
          class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
        >
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4 px-2">
              <a
                href="#"
                @click="toggleButton('navLayanan')"
                class="text-white hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-md font-medium"
              >
                <div>
                  <span>Layanan</span>
                  <svg
                    class="ml-1 pt-1 h-5 inline"
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
                </div>
              </a>
              <a
                href="#"
                class="text-white hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-md font-medium"
                >Tentang Kami</a
              >
            </div>
            <div
              class="origin-top-right absolute mt-2 w-40 rounded shadow-xl bg-white divide-y divide-gray-300 text-left"
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
                  >Netflix</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Spotify</a
                >
              </div>

              <div class="py-1">
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900"
                  role="menuitem"
                  >Udemy</a
                >
              </div>
            </div>
          </div>

          <button
            class="p-1 rounded-full hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white"
          >
            <span class="sr-only">View notifications</span>

            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="white"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
              />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="ml-3 relative">
            <div>
              <button
                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                id="user-menu"
                aria-haspopup="true"
                @click="toggleButton('navUserOption')"
              >
                <span class="sr-only">Open user menu</span>
                <img
                  class="h-8 w-8 rounded-full"
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                  alt=""
                />
              </button>
            </div>
            <div
              class="origin-top-right absolute right-0 mt-2 w-40 rounded shadow-xl bg-white divide-y divide-gray-300 text-left"
              v-bind:class="[navUserOption ? 'hidden' : '']"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="user-menu"
            >
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
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      v-bind:class="[toggle ? 'hidden' : '']"
      role="menu"
      aria-orientation="vertical"
      aria-labelledby="options-menu"
    >
      <!-- <div
        class="absolute overflow-hidden shadow-lg border-t-4 bg-white mb-4 rounded-b-lg rounded-t border-red-light w-full md:w-1/4"
      >
        <div class="px-6 py-4 mb-2 mt-4 ">
          <div class="flex space-x-4 px-2">
            <a
              href="#"
              @click="toggleButton('navLayanan')"
              class="text-black hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-md font-medium"
            >
              <div>
                <span>Layanan</span>
                <svg
                  class="ml-1 pt-1 h-5 inline"
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
              </div>
            </a>
            <a
              href="#"
              class="text-black hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-md font-medium"
              >Tentang Kami</a
            >
          </div>
        </div>
      </div> -->
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      toggle: true,
      navLayanan: true,
      navUserOption: true,
    }
  },
  methods: {
    toggleButton(value) {
      switch (value) {
        case 'toggle':
          console.log('oke')
          this.toggle = !this.toggle
          break
        case 'navLayanan':
          if (this.navUserOption === false) {
            this.navUserOption = true
          }
          this.navLayanan = !this.navLayanan
          break
        case 'navUserOption':
          if (this.navLayanan === false) {
            this.navLayanan = true
          }
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