<template>
  <!-- component footer -->
  <footer>
    <div class="bg-indigo-100">
      <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
        <div
          class="w-1/2 lg:w-1/4 md:w-full flex-shrink-0 lg:mx-0 mx-auto text-center lg:text-left"
        >
          <a
            class="flex title-font font-medium items-center lg:justify-start justify-center text-gray-900"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
              ></path>
            </svg>
            <span class="ml-3 text-xl">satu_akun</span>
          </a>
          <p class="mt-2 text-sm text-gray-600">
            Kami, sekelompok anak muda berlatar belakang IT, membuat platform
            beserta fasiltas-fasilitasnya untuk patungan membeli akun berbayar.
          </p>
        </div>

        <div
          class="flex-grow flex flex-wrap lg:pl-20 -mb-10 lg:mt-0 mt-10 md:text-left text-center"
        >
          <div class="w-1/2 px-4">
            <h2
              class="title-font font-medium uppercase text-gray-900 tracking-widest text-sm mb-3"
            >
              Penyedia Layanan
            </h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-600 hover:text-gray-800 cursor-pointer text-sm md:text-base"
                  >cs@satuakun.id</a
                >
              </li>
              <li>
                <a class="text-gray-600 hover:text-gray-800 cursor-pointer text-sm md:text-base"
                  >085155144278</a
                >
              </li>
            </nav>
          </div>
          <div class="w-1/2 px-4">
            <h2
              class="title-font font-medium uppercase text-gray-900 tracking-widest text-sm mb-3"
            >
              Kebijakan Layanan
            </h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-600 hover:text-gray-800 cursor-pointer text-sm md:text-base"
                  >Kebijakan Privasi</a
                >
              </li>
              <li>
                <a class="text-gray-600 hover:text-gray-800 cursor-pointer text-sm md:text-base"
                  >FAQ</a
                >
              </li>
              <li>
                <NuxtLink exact to="/pricing" class="text-gray-600 hover:text-gray-800 cursor-pointer text-sm md:text-base"
                  >Skema Harga
                </NuxtLink>
              </li>
            </nav>
          </div>
        </div>

        <span
          class="inline-flex lg:ml-auto lg:mt-0 mt-6 w-full justify-center md:justify-start md:w-auto"
        >
          <a class="text-gray-500 hover:text-gray-800 cursor-pointer">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500 hover:text-gray-800 cursor-pointer">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500 hover:text-gray-800 cursor-pointer">
            <svg
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path
                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
              ></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500 hover:text-gray-800 cursor-pointer">
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="0"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                stroke="none"
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
              ></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </span>
      </div>
    </div>
    <div class="bg-indigo-500">
      <div
        class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row"
      >
        <p class="text-white text-sm text-center sm:text-left">
          © 2020 satu_akun —
          <a
            href="https://twitter.com/apri0498"
            class="text-gray-300 ml-1"
            target="_blank"
            rel="noopener noreferrer"
            >@satu_akun</a
          >
        </p>
        <span
          class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-white text-sm"
          >God bless Indonesia</span
        >
      </div>
    </div>
  </footer>
  <!-- component footer -->
</template>
<script>
export default {
  name: 'Footer',
}
</script>
