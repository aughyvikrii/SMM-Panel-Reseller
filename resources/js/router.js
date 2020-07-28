import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

Vue.use(VueRouter)

// Pages
import Example from './components/ExampleComponent.vue'
import LoginView from './pages/Login.vue'
import RegisterView from './pages/Register.vue'
import ForgotPassword from './pages/ForgotPassword.vue'
import MustLoggedIn from './pages/MustLoggedIn.vue'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Example
  },
  {
    path : '/auth/login',
    name : 'Login',
    component: LoginView
  },
  {
    path : '/auth/register',
    name : 'Register',
    component : RegisterView
  },
  {
    path : '/forgot-password',
    name : 'ForgotPassword',
    component : ForgotPassword
  },
  {
    path : '/mustloggedin',
    name : 'MustLoggedIn',
    component : MustLoggedIn,
    meta : {
      requiresAuth : true
    }
  }
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next()
      return
    }
    next('/404')
  } else {
    next()
  }
})

export default router