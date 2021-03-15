export default ({ $axios, store }) => {
    if (process.server) {
      return
    }
  
    $axios.interceptors.request.use(request => {
      // Get token from auth.js store
      const token = store.state.auth.token
  
      // Update token axios header
      if (token) {
        $axios.setToken(token, 'Bearer')
      }
      return request
    })
  }