import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Pages
import Example from './components/ExampleComponent.vue'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Example
  }
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router