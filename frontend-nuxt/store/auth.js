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
}

// actions hanyalah function yg mentrigger mutations
// dipanggil dengan cara dispatch
export const actions = {
  async setToken({ commit }, { token, expiresIn = 0, role = 'u' }) {
    this.$axios.setToken(token, 'Bearer')
    const expiryTime = new Date(new Date().getTime() + expiresIn * 1000)
    cookies.set('x-access-token', token, { expires: expiryTime })
    await commit('SET_TOKEN', token)
  },

  async refreshToken({ dispatch }) {
    // const {token, expires_in} = await this.$axios.$post('refresh');
    // dispatch('setToken', {token, expires_in});
  },

  logout({ commit }) {
    this.$axios.setToken(false)
    cookies.remove('x-access-token')
    commit('REMOVE_TOKEN')
  },

  savePreviousRoute({ commit }, route) {
    commit('ADD_ROUTE', route)
  },
}
