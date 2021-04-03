export default ({ $axios, store }) => {
  if (process.server) {
    return
  }

  $axios.interceptors.request.use((request) => {
    // Get token from auth.js store
    const token = store.state.auth.token

    // Update token axios header
    let selisih = (Date.now() - store.state.auth.datetime) / 1000

    if (selisih > 3600) {
      store.dispatch('auth/logout')
    }
    if (token) {
      $axios.setToken(token, 'Bearer')
    }
    return request
  })
}
