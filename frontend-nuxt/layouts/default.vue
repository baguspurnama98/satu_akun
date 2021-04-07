<template>
  <div>
    <component :is="navbar"></component>
    <div :class="[navbar === 'Navbar' ? 'my-12' : 'mt-12 mb-24']">
      <div v-show="android || iphone" class="container py-5 px-3 flex flex-col mx-auto items-center justify-center content install-prompt">
        <p class="mb-4">Install aplikasi Patungin di ponsel kamu</p>
        
        <!-- notifikasi sedang menginstall -->
        <div v-show="beingInstalled" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full max-w-md mb-5" role="alert">
            <strong class="font-bold">Installing.</strong>
            <span class="block sm:inline">Sedang menginstall di perangkat.</span>
            <span @click.prevent="beingInstalled = false" class="absolute top-0 bottom-0 right-0 px-2 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        
        <!-- button pilihan -->
        <div class="flex mx-auto items-center flex-shrink-0 space-x-4">
          <button
            v-show="android"
            @click.prevent="addToHomeScreen()"
            class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none shadow-md"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              class="w-6 h-6"
              viewBox="0 0 512 512"
            >
              <path
                d="M99.617 8.057a50.191 50.191 0 00-38.815-6.713l230.932 230.933 74.846-74.846L99.617 8.057zM32.139 20.116c-6.441 8.563-10.148 19.077-10.148 30.199v411.358c0 11.123 3.708 21.636 10.148 30.199l235.877-235.877L32.139 20.116zM464.261 212.087l-67.266-37.637-81.544 81.544 81.548 81.548 67.273-37.64c16.117-9.03 25.738-25.442 25.738-43.908s-9.621-34.877-25.749-43.907zM291.733 279.711L60.815 510.629c3.786.891 7.639 1.371 11.492 1.371a50.275 50.275 0 0027.31-8.07l266.965-149.372-74.849-74.847z"
              ></path>
            </svg>
            <span class="ml-4 flex items-start flex-col leading-none">
              <span class="title-font font-medium">Android</span>
            </span>
          </button>
          <button
            v-show="iphone"
            @click.prevent="addToHomeScreen()"
            class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none shadow-md"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              class="w-6 h-6"
              viewBox="0 0 305 305"
            >
              <path
                d="M40.74 112.12c-25.79 44.74-9.4 112.65 19.12 153.82C74.09 286.52 88.5 305 108.24 305c.37 0 .74 0 1.13-.02 9.27-.37 15.97-3.23 22.45-5.99 7.27-3.1 14.8-6.3 26.6-6.3 11.22 0 18.39 3.1 25.31 6.1 6.83 2.95 13.87 6 24.26 5.81 22.23-.41 35.88-20.35 47.92-37.94a168.18 168.18 0 0021-43l.09-.28a2.5 2.5 0 00-1.33-3.06l-.18-.08c-3.92-1.6-38.26-16.84-38.62-58.36-.34-33.74 25.76-51.6 31-54.84l.24-.15a2.5 2.5 0 00.7-3.51c-18-26.37-45.62-30.34-56.73-30.82a50.04 50.04 0 00-4.95-.24c-13.06 0-25.56 4.93-35.61 8.9-6.94 2.73-12.93 5.09-17.06 5.09-4.64 0-10.67-2.4-17.65-5.16-9.33-3.7-19.9-7.9-31.1-7.9l-.79.01c-26.03.38-50.62 15.27-64.18 38.86z"
              ></path>
              <path
                d="M212.1 0c-15.76.64-34.67 10.35-45.97 23.58-9.6 11.13-19 29.68-16.52 48.38a2.5 2.5 0 002.29 2.17c1.06.08 2.15.12 3.23.12 15.41 0 32.04-8.52 43.4-22.25 11.94-14.5 17.99-33.1 16.16-49.77A2.52 2.52 0 00212.1 0z"
              ></path>
            </svg>
            <span class="ml-4 flex items-start flex-col leading-none">
              <span class="title-font font-medium">iOS</span>
            </span>
          </button>
        </div>
      </div>
      <Nuxt keep-alive :keep-alive-props="{ exclude: ['category'] }" />
    </div>
    <Footer v-if="navbar === 'Navbar'" />
  </div>
</template>

<script>
import Navbar from '@/components/Navbar'
import NavbarBottom from '@/components/NavbarBottom'

export default {
    data() {
        return {
            navbar: "Navbar",
            iphone: false,
            android: false,
            deferredPrompt: null,
            beingInstalled: false,
        }
    },
    components: {
        Navbar,
        NavbarBottom
    },
    watch: {
        $route(to, from) {
            const account = /account/i
            if (account.test(to.path)) {
                this.iphone = false
                this.android = false
                this.beingInstalled = false
            }
        }
    },
    mounted() {
        // console.log(this.$store.state.token)
        // jika sudah install, maka di hidden
        if (! window.matchMedia('(display-mode: standalone)').matches) {
            if (navigator.userAgent.toLowerCase().indexOf("android") > -1){
                this.android = true;
            }
            if (navigator.userAgent.toLowerCase().indexOf("iphone") > -1){
                // this.iphone = true;
            }
            const account = /account/i
            if (account.test(this.$route.path)) {
                this.iphone = false
                this.android = false
                this.beingInstalled = false
            }
            window.addEventListener('beforeinstallprompt', (event) => {
                event.preventDefault();
                this.deferredPrompt = event;
                return false;
            });
        } else {
            // this.navbar = "NavbarBottom"
        }
        if (this.android === true) {
            this.navbar = "NavbarBottom"
        }
    },
    methods: {
        addToHomeScreen() {
            if (this.deferredPrompt) {
                this.beingInstalled = true
                this.deferredPrompt.prompt();
                this.deferredPrompt.userChoice.then((choiceResult) => {
                    console.log(choiceResult.outcome);
                });
                this.deferredPrompt = null;
            }
        }
    },
}
</script>

<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}
</style>
