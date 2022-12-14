import { createRouter, createWebHistory } from "vue-router";

import App from '../../App'

const routes = [
  {
    path: '/',
    name: 'app.index',
    compomnent: App,
  }
]

export default createRouter({
  history: createWebHistory(),
  routes,
})