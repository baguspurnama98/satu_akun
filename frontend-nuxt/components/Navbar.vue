<template>
<nav class="p-4 sticky w-full z-10 top-0 shadow-lg bg-indigo-500 mb-6">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="flex items-center text-white">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <span class="text-2xl pl-2"><i class="em em-grinning"></i>Satu Akun</span>
            </a>
        </div>

        <div class="block lg:hidden">
            <button v-on:click="toggleButton()" id="nav-toggle" class="flex items-center px-3 py-2 border rounded bg-white border-gray-100 hover:text-indigio-600 hover:border-white">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path v-if="toggle" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    <path v-else d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>

        <div id="nav-content" class="w-full flex-grow lg:flex lg:items-center lg:w-auto lg:block pt-6 lg:pt-0" v-bind:class="[toggle ? 'hidden' : '']">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="nav-item">
                    <a class="px-3 py-2 rounded inline-block items-center leading-snug text-white hover:bg-gray-900 hover:text-gray-100" href="#pablo">
                        Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 rounded inline-block items-center leading-snug text-white hover:bg-gray-900 hover:text-gray-100" href="#pablo">
                        Tentang Kami
                    </a>
                </li>
                <li class="nav-item ml-0 mt-2 lg:mt-0 lg:ml-2">
                    <button class="px-5 py-2 rounded inline-block bg-white hover:bg-gray-900 hover:text-white" type="button">
                        Masuk
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
</template>

<script>
export default {
    name: 'Navbar',
    data() {
        return {
            toggle: true
        }
    },
    methods: {
        toggleButton() {
            this.toggle = !this.toggle
        }
    },
}

</script>
<style scoped>
#nav-content {
    align-items: right;
    text-align: right;
}
</style>