<template>
<div>
    <!-- <img alt="Vue logo" src="./assets/logo.png"> -->
    <!-- <headroom> -->
    <!-- <header> -->
    <Navbar />
    <!-- </header> -->
    <!-- </headroom> -->
    <HelloWorld msg="Welcome to Your Vue.js App" />

</div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
// import Template from './components/Template.vue'
import Navbar from './components/Navbar.vue'
// import { headroom }  from 'vue-headroom'

export default {
    name: 'App',
    components: {
        HelloWorld,
        Navbar,
        // headroom
    }
}
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;

}
</style>
