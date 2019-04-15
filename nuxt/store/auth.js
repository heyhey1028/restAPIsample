const state = () => ({
    user: {},
    jwt: '',
    loggedIn: false
  })
  
  const mutations = {
    setUserInfo (state, payload) {
      // FIXME: データの取得方法
      if (payload.data.access_token !== '') {
        state.user = payload.data.user_data
        state.jwt = payload.data.access_token
        state.loggedIn = true
      } else {
        console.log('JWT not attached!!!')
      }
    },
    logoutUserInfo (state) {
      state.user = {}
      state.jwt = ''
      state.loggedIn = false
    }
  }
  
  const actions = {
    async userLogin ({ commit }, res) {
      commit('setUserInfo', res)
    },
    async userLogout ({ commit }) {
      commit('logoutUserInfo')
    }
  }
  
  export default {
    state,
    mutations,
    actions
  }
  