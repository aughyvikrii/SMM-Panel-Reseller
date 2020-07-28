import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        status: '',
        token: localStorage.getItem('token') || '',
        user: {}
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success(state, token, user) {
            state.status = 'success'
            state.token = token
            state.user = user
        },
        auth_error(state) {
            state.status = 'error'
        },
        logout(state) {
            state.status = ''
            state.token = ''
        }
    },
    actions: {
        login({ commit }, user) {
            return new Promise( (resolve, reject) => {
                commit('auth_request')
                axios({ url : '/auth/login', data: user, method: 'POST' })
                .then( resp => {
                    const redirect = resp.redirect
                    localStorage.setItem('loggedIn',true)

                    commit('auth_success',redirect,user)
                    resolve(resp)
                })
                .catch(err => {
                    reject(err)
                })
            })
        }
    },
    getters: {
    }
})