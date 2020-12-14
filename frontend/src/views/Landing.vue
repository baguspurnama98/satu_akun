<template>
  <div class="home">
    <div class="relative flex flex-col items-center justify-center bg-white min-h-screen min-w-screen">
      <div class="flex flex-col flex-col-reverse items-center justify-center p-10 mx-auto lg:flex-row lg:max-w-6xl lg:p-0">
        <div class="relative w-full pr-10 rounded-lg md:w-2/3 lg:w-1/2 group">
          <div class="relative">
            <img src="../assets/img/home_cinema.svg" class="z-10 object-cover w-full h-full" />
          </div>
        </div>
        <div class="container flex flex-col w-full px-5 pr-12 mb-16 text-2xl text-gray-700 lg:w-1/2 sm:px-0 md:px-10 sm:items-center lg:items-start lg:mb-0">
          <h1 class="font-sans text-4xl font-extrabold leading-none text-black sm:text-5xl xl:text-6xl sm:text-center lg:text-left">
            <span class="relative">
              <span class="absolute bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-yellow-200"></span>
              <span class="relative">Watch Together,</span>
            </span>
            <span class="relative block text-yellow-400">Pay Together.</span>
          </h1>
          <p class="relative block mt-6 text-base text-gray-600 xl:text-lg sm:text-center lg:text-left">Bergabung untuk berlangganan platform premium secara patungan.</p>
          <div class="relative flex items-center mt-10">
            <a href="#_" class="flex items-center self-start px-5 py-3 rounded-md text-base leading-tight text-white inline-block transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700">Lihat Platform</a>
          </div>
        </div>
      </div>
    </div>

    <hello-world />
  </div>
</template>

<script>
import HelloWorld from "@/components/HelloWorld.vue";

export default {
  name: "Home",
  components: {
    HelloWorld,
  },
  data() {
    return {
      toggleModel: false,
    };
  },
  props: {
    msg: String,
  },
  methods: {
    openModal() {
      this.$refs.modal.show();
    },
  },
};
</script>

<style scoped>
.netflix {
  background-color: #f76363;
  background-image: var(--svg-pattern-dashboard);
  background-position: center;
}

.spotify {
  background-color: #5deb97;
  background-image: var(--svg-pattern-dashboard);
  background-position: center;
}

.steam {
  background-color: #686868;
  background-image: var(--svg-pattern-dashboard);
  background-position: center;
}

.disney {
  background-color: #4c95ff;
  background-image: var(--svg-pattern-dashboard);
  background-position: center;
}
.landing-pic {
  width: 500px;
}
</style>
