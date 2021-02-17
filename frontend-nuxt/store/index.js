import cookies from 'js-cookie';

export const state = () => ({
  token: null,
});

export const mutations = {
  SET_TOKEN(state, token) {
    state.token = token;
  },

  REMOVE_TOKEN(state) {
    state.token = null;
  }
};

export const actions = {
  async setToken({commit}, {token, expiresIn}) {
    this.$axios.setToken(token, 'Bearer');
    const expiryTime = new Date(new Date().getTime() + expiresIn * 1000);
    cookies.set('x-access-token', token, {expires: expiryTime});
    await commit('SET_TOKEN', token);
  },

  async refreshToken({dispatch}) {
    // const {token, expires_in} = await this.$axios.$post('refresh');
    // dispatch('setToken', {token, expires_in});
  },

  logout({commit}) {
    this.$axios.setToken(false);
    cookies.remove('x-access-token');
    commit('REMOVE_TOKEN');
  }
};