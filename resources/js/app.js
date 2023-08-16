import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
// import { createRouter, createWebHistory } from 'vue-router';
// import { routes } from './routes';

const Vue = createApp(App);

Vue.use(VueAxios, axios);

// const router = createRouter({
//   history: createWebHistory(),
//   routes: routes
// });

// Vue.use(router);
Vue.mount('#app');