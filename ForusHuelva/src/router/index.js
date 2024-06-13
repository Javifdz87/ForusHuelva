import { createRouter, createWebHistory } from 'vue-router';
import Login from '@/views/LoginView.vue';
import Register from '@/views/RegisterView.vue';
import ClientsTable from '@/views/ClientsView.vue';
import SuscriptionTable from '@/views/SuscriptionView.vue';
import RentTable from '@/views/RentView.vue';
import CourtsTable from '@/views/CourtsView.vue';
import Home from '@/views/HomeView.vue';
import Nav from '@/views/NavView.vue';
import Search from '@/views/SearchView.vue'
import NewClient from '@/views/NewClientView.vue';
import PanelClient from '@/views/PanelClientView.vue';
import Bienvenido from '@/views/BienvenidoView.vue';





// Importa tus componentes de las diferentes vistas

const routes = [
 
  {
    path: '/home',
    name: 'home',
    component: Home
  },
  {
    path: '/',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/clientsTable',
    name: 'clientsTable',
    component: ClientsTable
  },
  {
    path: '/suscriptionTable',
    name: 'suscriptionTable',
    component: SuscriptionTable
  },
  {
    path: '/rentTable',
    name: 'rentTable',
    component: RentTable
  },
  {
    path: '/courtsTable',
    name: 'courtsTable',
    component: CourtsTable
  },
  {
    path: '/nav',
    name: 'nav',
    component: Nav
  },  

  {
    path: '/search',
    name: 'Search',
    component: Search
  }, 
  {
    path: '/newclient',
    name: 'newclient',
    component: NewClient
  }, 
  {
    path: '/PanelClient',
    name: 'panelClient',
    component: PanelClient,
    props: route => ({ email: route.params.email })

  }, 
  {
    path: '/bienvenido',
    name: 'bienvenido',
    component: Bienvenido
  }, 
  
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

