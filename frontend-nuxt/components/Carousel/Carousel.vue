<template>
    <div class="mx-auto relative">
        <!-- Slides -->
        <div v-for="slide in slides" :key="slide">
            <div v-show="activeSlide === slide"
                class="p-24 font-bold text-5xl h-64 flex items-center bg-indigo-500 text-white rounded-lg">
                <span class="w-12 text-center" v-text="slide"></span>
                <span class="text-indigo-300">/</span>
                <span class="w-12 text-center" v-text="slides.length"></span>
            </div>
        </div>
        
        <!-- Prev/Next Arrows -->
        <div class="absolute inset-0 flex">
            <div class="flex items-center justify-start w-1/2">
                <button 
                    class="bg-indigo-100 text-indigo-500 hover:text-red-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
                    v-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                    <span>&#8592;</span>
                </button>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <button 
                    class="bg-indigo-100 text-indigo-500 hover:text-red-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6"
                    @click.prevent="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                    <span>&#8594;</span>
                </button>
            </div>        
        </div>

        <!-- Buttons -->
        <div class="absolute w-full flex items-center justify-center px-4">
            <div v-for="slide in slides" :key="slide">
                <button class="flex-1 w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-indigo-600 hover:shadow-lg"
                :class="{ 
                    'bg-red-600': activeSlide === slide,
                    'bg-indigo-300': activeSlide !== slide 
                }" 
                @click.prevent="activeSlide = slide"
                ></button>
            </div>
        </div>
    </div>
        
</template>

<script>
export default {
    name: 'Carousel',
    data() {
        return {
            activeSlide: 1,
            slides: [1, 2, 3, 4, 5],
        }
    }
}
</script>