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
    path: '/item',
    name: 'Home',
    component: () => import('../views/Home/Home.vue')
  },
  {
    path: '/item/add-item',
    name: 'AddItem',
    component: () => import('../views/Home/AddItem.vue')
  },
  {
    path: '/item/detail-item/:id?',
    name: 'DetailItem',
    component: () => import('../views/Home/DetailItem.vue')
  },
  {
    path: '/item/edit-item/:id?',
    name: 'EditItem',
    component: () => import('../views/Home/EditItem.vue')
  },
  {
    path: '/item/item-archive',
    name: 'ItemArchive',
    component: () => import('../views/Home/ItemArchive.vue')
  },
  {
    path: '/stocks',
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
  {
    path: '/members/member-detail/:accountid?',
    name: 'MemberDetail',
    component: () => import('../views/Members/MemberDetail.vue')
  },
  {
    path: '/members/edit-member/:accountid?',
    name: 'EditMember',
    component: () => import('../views/Members/EditMember.vue')
  },
  {
    path: '/members/archive',
    name: 'MembersArchive',
    component: () => import('../views/Members/MembersArchive.vue')
  },
  {
    path: '/edit-account',
    name: 'EditAccount',
    component: () => import('../views/Members/EditAccount.vue')
  },
  {
    path: '/change-password',
    name: 'ChangePassword',
    component: () => import('../views/Members/ChangePassword.vue')
  },
  {
    path: '/category',
    name: 'Category',
    component: () => import('../views/Category/Category.vue')
  },
  {
    path: '/log-manager',
    name: 'LogManager',
    component: () => import('../views/LogManager/LogManager.vue')
  },
  {
    path: '/backup-database',
    name: 'BackupDatabase',
    component: () => import('../views/BackupDatabase/BackupDatabase.vue')
  },
  {
    path: '/report',
    name: 'Report',
    component: () => import('../views/Report/Report.vue')
  },
]

const router = new VueRouter({
  routes
})

export default router
