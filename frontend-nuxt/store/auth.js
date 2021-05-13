import cookies from 'js-cookie'

export const state = () => ({
  token: null,
  datetime: null,
  previousRoute: null,
})

// mutation adalah event
// mutation is the only way to modify state
// di trigger dengan commit
export const mutations = {
  SET_TOKEN(state, token) {
    state.token = token
    state.datetime = Date.now()
  },

  REMOVE_TOKEN(state) {
    state.token = null
  },

  ADD_ROUTE: (state, route) => {
    state.previousRoute = route
  },

  GET_TOKEN(state) {
    return state.token
  }
}

// actions hanyalah function yg mentrigger mutations
// dipanggil dengan cara dispatch
export const actions = {
  // ini aslinya login
  async setToken({ commit }, { token, expiresIn = 0 }) {
    this.$axios.setToken(token, 'Bearer')
    const expiryTime = new Date(new Date().getTime() + expiresIn * 1000)
    cookies.set('x-access-token', token, { expires: expiryTime })
    await commit('SET_TOKEN', token)

    // notify others tab if we had login
    window.localStorage.setItem('SHARING_CREDENTIAL', token)
    window.localStorage.removeItem('SHARING_CREDENTIALS')
  },

  async setAxiosToken({ commit }, { token }) {
    this.$axios.setToken(token, 'Bearer')
    await commit('SET_TOKEN', token)
  },

  async getAxiosToken({ commit }, { token }) {
    return commit('GET_TOKEN', token)
  },

  async refreshToken({ dispatch }) {
    // const {token, expires_in} = await this.$axios.$post('refresh');
    // dispatch('setToken', {token, expires_in});
  },

  logout({ commit }) {
    this.$axios.setToken(false)
    cookies.remove('x-access-token')
    commit('REMOVE_TOKEN')

    window.localStorage.setItem('CREDENTIALS_FLUSH', Date.now().toString())
    window.localStorage.removeItem('CREDENTIALS_FLUSH')
  },

  savePreviousRoute({ commit }, route) {
    commit('ADD_ROUTE', route)
  },
}
