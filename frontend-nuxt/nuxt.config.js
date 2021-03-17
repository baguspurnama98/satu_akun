let isDev = process.env.NODE_ENV !== 'production'


export default {
  // Disable server-side rendering (https://go.nuxtjs.dev/ssr-mode)
  ssr: false,

  // Target (https://go.nuxtjs.dev/config-target)
  target: 'static',

  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'Patungin.com',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // untuk generate file robots.txt, disable dulu

  //   robots: {
  //     UserAgent: '*',
  //     Disallow: '/signin',
  //   },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: ['~/assets/css/main.css'],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  // Vuex persisted hanya berlaku di ssr: false (client-side)
  plugins: [
    '~/plugins/close-event.client.js',
    '~/plugins/filters.js',
    '~/plugins/datatable.js',
    '~/plugins/inject-token.js',
    

    { src: '~/plugins/vuex-persist', ssr: false },
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
    '@nuxtjs/moment',
    '@nuxtjs/pwa',
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    // https://go.nuxtjs.dev/content
    '@nuxt/content',
    // untuk generate file env
    '@nuxtjs/dotenv',
  ],

  // Axios module configuration (https://go.nuxtjs.dev/config-axios)
  axios: {
    baseURL: isDev ? process.env.API_DEV_URL : process.env.API_DEV_PROD,
  },

  // Content module configuration (https://go.nuxtjs.dev/config-content)
  content: {},

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {},

  pwa: {
    manifest: {
      name: 'Kita Patungan Indonesia',
      short_name: 'Kita Patungan',
      lang: 'id',
      display: 'standalone',
    },
    meta: {
      nativeUI: true,
    },
    workbox: {
      autoRegister: true,
      clientsClaim: true,
      skipWaiting: true,
      //    dev: true // or use a global variable to track the current NODE_ENV, etc to determine dev mode
    },
  },

  router: {
    middleware: 'auth',
  },

  loadingIndicator: {
    name: 'chasing-dots',
    color: '#667EEA',
    background: 'white',
  },
}
