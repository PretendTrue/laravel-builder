import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => require('../views/Home.vue'),
  },
]

window.Builder.basePath = '/' + window.Builder.path;

let routerBasePath = window.Builder.basePath + '/';

if (window.Builder.path === '' || window.Builder.path === '/') {
  routerBasePath = '/';
  window.Builder.basePath = '';
}

const router = createRouter({
    history: createWebHistory(routerBasePath),
    routes,
})

export default router
