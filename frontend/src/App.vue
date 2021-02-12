<template>
    <div id="app" class="font-sans">
        <Navbar />
        <router-view/>
        <Footer />
    </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import Navbar from "@/components/Navbar.vue";

export default {
    components: {
        Navbar,
        Footer,
    }
}
</script>

<style>
#app {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}
</style>
