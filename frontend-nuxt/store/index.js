export const state = () => {
  return {
    user: null,
  }
}

export const actions = {
  getUserProfile(context, dataUser) {
    context.commit('setUserProfile', dataUser)
  },

  delUserProfile(context) {
    context.commit('setUserProfile', null)
  },
}

export const mutations = {
  setUserProfile(state, dataUser) {
    state.user = dataUser
  },
}
