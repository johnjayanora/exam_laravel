import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import PasserCount from './views/PasserCount.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/nce-2018-passers',
      name: 'home',
      component: Home,
      
    },
    {
      path: '/school-ranking',
      name: 'school-ranking',
      component:PasserCount
    }
  ]
})
