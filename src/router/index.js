import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Login',
    component: () => import('../views/Login/Login.vue')
  },
  {
    path: '/home',
    name: 'Home',
    component: () => import('../views/Home/Home.vue')
  },
  {
    path: '/inventory',
    name: 'Inventory',
    component: () => import('../views/Inventory/Inventory.vue')
  },
  {
    path: '/sales',
    name: 'Sales',
    component: () => import('../views/Sales/Sales.vue')
  },
  {
    path: '/members',
    name: 'Members',
    component: () => import('../views/Members/Members.vue')
  },
  {
    path: '/members/add-member',
    name: 'AddMember',
    component: () => import('../views/Members/AddMember.vue')
  },
]

const router = new VueRouter({
  routes
})

export default router
