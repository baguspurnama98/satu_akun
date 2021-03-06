import cookies from 'js-cookie'

export const state = () => ({
  token: null,
})

// mutation adalah event
// mutation is the only way to modify state
// di trigger dengan commit
export const mutations = {
  SET_TOKEN(state, token) {
    state.token = token
  },

  REMOVE_TOKEN(state) {
    state.token = null
  },
}

// actions hanyalah function yg mentrigger mutations
// dipanggil dengan cara dispatch
export const actions = {
  async setToken({ commit }, { token, expiresIn, role = 'u' }) {
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
}
