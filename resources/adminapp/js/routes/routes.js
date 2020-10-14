import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'Dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'Users' }
          }
        ]
      },
      {
        path: 'tags',
        name: 'tags.index',
        component: () => import('@cruds/Tags/Index.vue'),
        meta: { title: 'Tags' }
      },
      {
        path: 'tags/create',
        name: 'tags.create',
        component: () => import('@cruds/Tags/Create.vue'),
        meta: { title: 'Tags' }
      },
      {
        path: 'tags/:id',
        name: 'tags.show',
        component: () => import('@cruds/Tags/Show.vue'),
        meta: { title: 'Tags' }
      },
      {
        path: 'tags/:id/edit',
        name: 'tags.edit',
        component: () => import('@cruds/Tags/Edit.vue'),
        meta: { title: 'Tags' }
      },
      {
        path: 'categories',
        name: 'categories.index',
        component: () => import('@cruds/Categories/Index.vue'),
        meta: { title: 'Categories' }
      },
      {
        path: 'categories/create',
        name: 'categories.create',
        component: () => import('@cruds/Categories/Create.vue'),
        meta: { title: 'Categories' }
      },
      {
        path: 'categories/:id',
        name: 'categories.show',
        component: () => import('@cruds/Categories/Show.vue'),
        meta: { title: 'Categories' }
      },
      {
        path: 'categories/:id/edit',
        name: 'categories.edit',
        component: () => import('@cruds/Categories/Edit.vue'),
        meta: { title: 'Categories' }
      },
      {
        path: 'questions',
        name: 'questions.index',
        component: () => import('@cruds/Questions/Index.vue'),
        meta: { title: 'Questions' }
      },
      {
        path: 'questions/create',
        name: 'questions.create',
        component: () => import('@cruds/Questions/Create.vue'),
        meta: { title: 'Questions' }
      },
      {
        path: 'questions/:id',
        name: 'questions.show',
        component: () => import('@cruds/Questions/Show.vue'),
        meta: { title: 'Questions' }
      },
      {
        path: 'questions/:id/edit',
        name: 'questions.edit',
        component: () => import('@cruds/Questions/Edit.vue'),
        meta: { title: 'Questions' }
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
