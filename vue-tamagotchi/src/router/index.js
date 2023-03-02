import { createRouter, createWebHistory } from 'vue-router'
import BejelentkezesView from '../views/BejelentkezesView.vue'
import RegisztracioView from '../views/RegisztracioView.vue'
import KedvencView from '../views/KedvencView.vue'
import FiokView from '../views/FiokView.vue'
import CreateView from '../views/CreateView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      meta: {requiresAuth:false},
      component: BejelentkezesView
    },
    {
      path: '/signup',
      name: 'signup',
      meta: {requiresAuth:false},
      component: RegisztracioView
    },
    {
      path: '/pet',
      name: 'pet',
      meta: {requiresAuth:true},
      component: KedvencView
    },
    {
      path: '/account',
      name: 'account',
      meta: {requiresAuth:true},
      component: FiokView
    },
    {
      path: '/create',
      name: 'create',
      meta: {requiresAuth:true},
      component: CreateView
    }
  ]
})

export default router
function authguard(to,from,next){
if(!to.meta.requiresAuth){
  next();
}
else{
  if(localStorage.getItem('token') != null){
    next();
  }
  else{
    next({name:"login"});
  }
}
}
router.beforeEach(authguard);

