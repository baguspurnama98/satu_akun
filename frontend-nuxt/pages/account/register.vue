<template>
  <div class="flex flex-col justify-center items-center">
    <!-- Content disini -->
    <Carousel />
  </div>
</template>

<script>
import Carousel from '@/components/Carousel/Carousel'

export default {
    name: 'Register',
    layout: 'default',
    components: { Carousel },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
