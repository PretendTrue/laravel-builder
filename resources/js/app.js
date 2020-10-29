import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);

Vue.prototype.$http = axios.create();

window.Builder.basePath = '/' + window.Builder.path;

let routerBasePath = window.Builder.basePath + '/';

if (window.Builder.path === '' || window.Builder.path === '/') {
  routerBasePath = '/';
  window.Builder.basePath = '';
}

const router = new VueRouter({
  routes,
  mode: 'history',
  base: routerBasePath,
});

new Vue({
  el: '#builder',
  router,
})
