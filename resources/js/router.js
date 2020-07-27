import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Pages
import Example from './components/ExampleComponent.vue'
import LoginView from './pages/Login.vue'
import RegisterView from './pages/Register.vue'
import ForgotPassword from './pages/ForgotPassword.vue'
import MustLoggedIn from './pages/MustLoggedIn'

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
    path : 'mustLoggedIn',
    name : 'MustLoggedIn',
    component : MustLoggedIn
  }
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router