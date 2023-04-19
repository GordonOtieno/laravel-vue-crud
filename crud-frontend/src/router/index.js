import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import TaskIndex from '../views/tasks/TaskIndex.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
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
