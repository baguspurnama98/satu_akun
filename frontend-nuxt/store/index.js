export const state = () => {
  return {
    user: null,
  }
}

export const actions = {
  getUserProfile(context, dataUser) {
    context.commit('setUserProfile', dataUser)
  },
}

export const mutations = {
  setUserProfile(state, dataUser) {
    state.user = dataUser
  },
}
