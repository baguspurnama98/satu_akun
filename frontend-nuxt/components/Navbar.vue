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
            class="relative inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-expanded="false"
            @click="toggleButton('toggle')"
          >
            <span class="sr-only">Open main menu</span>
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
              <!-- <a
                href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                >Beranda</a
              > -->
              <a
                href="#"
                @click="toggleButton('navLayanan')"
                class="text-white hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-sm font-medium"
              >
                <div>
                  <span>Layanan</span>
                  <!-- Heroicon name: chevron-down -->
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
                class="text-white hover:bg-indigo-700 hover:text-white px-2 py-2 rounded-md text-sm font-medium"
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
      <!-- <div class="px-3 pt-2 pb-3 space-y-1">
        <a
          href="#"
          class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
          >Beranda</a
        >
        <a
          href="#"
          class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
          >Layanan</a
        >
        <a
          href="#"
          class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
          >Tentang Kami</a
        >
      </div> -->
      <div
        class="absolute overflow-hidden shadow-lg border-t-4 bg-white mb-4 rounded-b-lg rounded-t border-red-light w-full md:w-1/4"
      >
        <div class="px-6 py-4 mb-2 mt-4 mb-8">
          <div class="uppercase tracking-wide text-c2 mb-4">Section 1</div>
          <div
            class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest border-b-0"
            style="border-left: 4px solid #e2624b !important"
          >
            <svg
              width="18"
              height="18"
              viewBox="0 0 1792 1792"
              xmlns="http://www.w3.org/2000/svg"
              style="fill: #e2624b"
            >
              <path
                d="M960 256q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm832 928v352q0 22-20 30-8 2-12 2-12 0-23-9l-93-93q-119 143-318.5 226.5t-429.5 83.5-429.5-83.5-318.5-226.5l-93 93q-9 9-23 9-4 0-12-2-20-8-20-30v-352q0-14 9-23t23-9h352q22 0 30 20 8 19-7 35l-100 100q67 91 189.5 153.5t271.5 82.5v-647h-192q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h192v-163q-58-34-93-92.5t-35-128.5q0-106 75-181t181-75 181 75 75 181q0 70-35 128.5t-93 92.5v163h192q26 0 45 19t19 45v128q0 26-19 45t-45 19h-192v647q149-20 271.5-82.5t189.5-153.5l-100-100q-15-16-7-35 8-20 30-20h352q14 0 23 9t9 23z"
              />
            </svg>
            <div class="pl-2">First</div>
          </div>
          <div
            class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest border-b-0"
          >
            <svg
              width="18"
              height="18"
              viewBox="0 0 2048 1792"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M640 896v512h-256v-512h256zm384-512v1024h-256v-1024h256zm1024 1152v128h-2048v-1536h128v1408h1920zm-640-896v768h-256v-768h256zm384-384v1152h-256v-1152h256z"
              />
            </svg>
            <div class="pl-2">Second</div>
          </div>
          <div
            class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest"
          >
            <svg
              width="18"
              height="18"
              viewBox="0 0 2048 1792"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M480 1280q-66 0-113-47t-47-113v-704q0-66 47-113t113-47h1088q66 0 113 47t47 113v704q0 66-47 113t-113 47h-1088zm-32-864v704q0 13 9.5 22.5t22.5 9.5h1088q13 0 22.5-9.5t9.5-22.5v-704q0-13-9.5-22.5t-22.5-9.5h-1088q-13 0-22.5 9.5t-9.5 22.5zm1376 928h160v96q0 40-47 68t-113 28h-1600q-66 0-113-28t-47-68v-96h1760zm-720 96q16 0 16-16t-16-16h-160q-16 0-16 16t16 16h160z"
              />
            </svg>
            <div class="pl-2">Third</div>
          </div>
          <div class="uppercase tracking-wide text-c2 mb-4 mt-8">Section 2</div>
          <div
            class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest"
          >
            <svg
              width="18"
              height="18"
              viewBox="0 0 2048 1792"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M480 1088q0-66-47-113t-113-47-113 47-47 113 47 113 113 47 113-47 47-113zm36-320h1016l-89-357q-2-8-14-17.5t-21-9.5h-768q-9 0-21 9.5t-14 17.5zm1372 320q0-66-47-113t-113-47-113 47-47 113 47 113 113 47 113-47 47-113zm160-96v384q0 14-9 23t-23 9h-96v128q0 80-56 136t-136 56-136-56-56-136v-128h-1024v128q0 80-56 136t-136 56-136-56-56-136v-128h-96q-14 0-23-9t-9-23v-384q0-93 65.5-158.5t158.5-65.5h28l105-419q23-94 104-157.5t179-63.5h768q98 0 179 63.5t104 157.5l105 419h28q93 0 158.5 65.5t65.5 158.5z"
              />
            </svg>
            <div class="pl-2">Fourth</div>
          </div>
          <div>
            <div class="uppercase tracking-wide text-c2 mb-4 mt-8">
              Section 3
            </div>
            <div
              class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest"
            >
              <svg
                width="18"
                height="18"
                viewBox="0 0 2048 1792"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1024 672q119 0 203.5 84.5t84.5 203.5-84.5 203.5-203.5 84.5-203.5-84.5-84.5-203.5 84.5-203.5 203.5-84.5zm704-416q106 0 181 75t75 181v896q0 106-75 181t-181 75h-1408q-106 0-181-75t-75-181v-896q0-106 75-181t181-75h224l51-136q19-49 69.5-84.5t103.5-35.5h512q53 0 103.5 35.5t69.5 84.5l51 136h224zm-704 1152q185 0 316.5-131.5t131.5-316.5-131.5-316.5-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5z"
                />
              </svg>
              <div class="pl-2">Fifth</div>
            </div>
          </div>
        </div>
      </div>
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
