<template>
  <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-indigo-500 mb-3">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
      <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
        <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap text-white text-lg" href="#pablo">
          SatuAkun
        </a>
        <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" v-on:click="toggleNavbar()">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <div v-bind:class="{'hidden': !showMenu, 'flex': showMenu}" class="lg:flex lg:flex-grow items-center">
        <ul class="flex flex-col lg:flex-row list-none ml-auto">
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs  font-bold leading-snug text-white hover:opacity-75" href="#pablo">
              <i class=" text-lg leading-lg text-white opacity-75" /><span class="ml-2">Layanan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs  font-bold leading-snug text-white hover:opacity-75" href="#pablo">
              <i class=" text-lg leading-lg text-white opacity-75" /><span class="ml-2">Tentang Kami</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs  font-bold leading-snug text-white hover:opacity-75" href="#pablo">
              <i class=" text-lg leading-lg text-white opacity-75" /><span class="ml-2">Daftar</span>
            </a>
          </li>
          <li>
            <button class="px-4 py-1 rounded text-white inline-block bg-red-500 hover:bg-indigo-600 focus:bg-indigo-700" type="button">
              Login
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "pink-navbar",
  data() {
    return {
      showMenu: false
    }
  },
  methods: {
    toggleNavbar: function(){
      this.showMenu = !this.showMenu;
    }
  }
}
</script>