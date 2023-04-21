import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import TaskIndex from '../views/tasks/TaskIndex.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [

    {
      path: '/',
      name: 'Home',
      component: HomeView
    },
    {
      path: '/register',
      name: 'Register',
      component: () => import('../views/user/Register.vue')
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import('../views/user/Login.vue')
    },
    {
      path: '/tasks',
      name: 'TaskIndex',
      component: () => import('../views/tasks/TaskIndex.vue')
    },
    {
      path: '/tasks/create',
      name: 'TaskCreate',
      component: () => import('../views/tasks/TaskCreate.vue')
    },
    {
      path: '/tasks/:id/edit',
      name: 'TaskEdit',
      component: () => import('../views/tasks/TaskEdit.vue'),
      props:true
    }
  ]
})

export default router
