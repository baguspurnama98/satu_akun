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
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        rel: 'preload',
        as: 'font',
        type: 'font/woff2',
        href: 'https://fonts.googleapis.com/css2?family=Righteous&display=swap',
      },
    ],
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
    '~/plugins/v-shared-element.client.js',

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
    '@nuxtjs/onesignal',
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
    baseURL: !isDev ? process.env.API_PROD_URL : process.env.API_DEV_URL, //---
    retry: { retries: 3 },
  },

  // Content module configuration (https://go.nuxtjs.dev/config-content)
  content: {},

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {},

  pwa: {
    manifest: {
      name: 'Platform Patungan Indonesia',
      short_name: 'Patungin',
      lang: 'id',
      display: 'standalone',
    },
    meta: {
      nativeUI: true,
      theme_color: '#fff',
    },
    workbox: {
      autoRegister: true,
      clientsClaim: true,
      skipWaiting: true,
      //    dev: true // or use a global variable to track the current NODE_ENV, etc to determine dev mode
    },
  },

  // Options
  oneSignal: {
    init: {
      appId: 'd71c3ed3-4d72-4d75-a6d9-44de6a526672',
      allowLocalhostAsSecureOrigin: true,
      welcomeNotification: {
        disable: true
      },
      autoResubscribe: true,
      promptOptions: {
        customlink: {
          enabled: true, /* Required to use the Custom Link */
          style: "button", /* Has value of 'button' or 'link' */
          size: "medium", /* One of 'small', 'medium', or 'large' */
          color: {
            button: '#eb682c', /* Color of the button background if style = "button" */
            text: '#fff', /* Color of the prompt's text */
          },
          text: {
            subscribe: "Aktifkan", /* Prompt's text when not subscribed */
            unsubscribe: "Nonaktifkan", /* Prompt's text when subscribed */
          },
          unsubscribeEnabled: true, /* Controls whether the prompt is visible after subscription */
        }
      }
    }
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
