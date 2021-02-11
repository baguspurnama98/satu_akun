<template>
  <div>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-12">
        <div class="w-full max-w-md">
            <form class="shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4">
                <!-- @csrf -->
                <div class="text-gray-700 text-3xl flex justify-center py-2 mb-8">
                    Silakan Masuk
                </div>
                <div class="mb-4">
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" />
                </div>
                <div class="mb-6">
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-3 leading-tight focus:border-indigo-500 focus:outline-none" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>
                <div class="flex items-center justify-between">
                    <button class="px-6 py-2 rounded text-white inline-block shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        Masuk
                    </button>
                    <a class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800" href="#">
                        Butuh Bantuan?
                    </a>
                </div>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
import Carousel from '@/components/Carousel/Carousel'

export default {
    name: 'Login',
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
