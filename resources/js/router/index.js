import { createRouter, createWebHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import Catalog from '../pages/Catalog.vue'
import ProductPage from '../pages/ProductPage.vue'
import Cart from '../pages/Cart.vue'
import About from '../pages/About.vue'
import Contacts from '../pages/Contacts.vue'
import Payment from '../pages/Payment.vue'
import Shops from '../pages/Shops.vue'
import Service from '../pages/Service.vue'
import ReviewList from '../pages/ReviewList.vue'
import Profile from '../pages/Profile.vue'

import NotFound from '../pages/NotFound.vue'

const routes = [
    { path: '/', component: Home },
    { path: '/catalog', component: Catalog },
    { path: '/product/:id', component: ProductPage },
    { path: '/cart', component: Cart },
    { path: '/about', component: About },
    { path: '/contacts', component: Contacts },
    { path: '/payment', component: Payment },
    { path: '/shops', component: Shops },
    { path: '/service', component: Service },
    { path: '/reviews', component: ReviewList },
    { path: '/profile', component: Profile },

    //404 должна быть всегда последней!
    { path: '/:pathMatch(.*)*', component: NotFound }
]

export default createRouter({
    history: createWebHistory(),
    routes
})