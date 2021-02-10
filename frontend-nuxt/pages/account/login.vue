<
<template>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div
      class="flex items-center h-auto py-20 xs:py-10 w-full lg:justify-center"
    >
      <div
        class="flex flex-col overflow-hidden bg-white min-w-full h-4/5 rounded-md shadow-lg md:flex-row md:flex-1 lg:max-w-screen-md"
      >
        <div
          class="py-6 px-6 text-white bg-indigo-500 w-1/2 xs:w-full relative xs:hidden"
        >
          <div class="my-3 text-4xl font-bold tracking-wider text-center">
            <a href="#">Berpatungan.com</a>
          </div>
          <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
            Dengan Berpatungan, kamu bisa berlangganan akun premium lebih
            murah!<br />
            Ayo segera berpatungan!
          </p>
          <div class="absolute inset-x-0 bottom-0 py-3">
            <p class="flex flex-col items-center justify-center text-center">
              <span
                >Belum punya akun?
                <a href="/account/register" class="underline">Daftar!</a></span
              >
            </p>
          </div>
        </div>
        <div class="p-5 bg-white md:flex-1">
          <h3 class="font-bold py-3 text-4xl text-indigo-500">Masuk</h3>
          <form action="#" class="flex flex-col space-y-5">
            <div class="flex flex-col space-y-1">
              <label for="email" class="text-sm font-semibold text-gray-500"
                >Email</label
              >
              <input
                type="email"
                id="email"
                autofocus
                class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-indigo-400 focus:outline-none focus:ring"
              />
            </div>
            <div class="flex flex-col space-y-1">
              <div class="flex items-center justify-between">
                <label
                  for="password"
                  class="text-sm font-semibold text-gray-500"
                  >Password</label
                >
                <a
                  href="#"
                  class="text-sm text-blue-600 hover:underline focus:text-blue-800"
                  >Lupa Password?</a
                >
              </div>
              <input
                type="password"
                id="password"
                class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-indigo-400 focus:outline-none focus:ring"
              />
            </div>
            <div class="flex items-center space-x-2">
              <input
                type="checkbox"
                id="remember"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label for="remember" class="text-sm font-semibold text-gray-500"
                >Ingat saya</label
              >
            </div>
            <div>
              <button
                type="submit"
                class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-blue-500 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-blue-200 focus:ring-4"
              >
                Masuk
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
