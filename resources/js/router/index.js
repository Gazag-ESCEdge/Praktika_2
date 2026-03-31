import { createRouter, createWebHistory } from 'vue-router'

import Catalog from '../pages/Catalog.vue'
import Product from '../pages/Product.vue'
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
    { path: '/', component: Catalog },
    { path: '/tovar/:id', component: Product },
    { path: '/korzina', component: Cart },
    { path: '/o-kompanii', component: About },
    { path: '/kontakty', component: Contacts },
    { path: '/oplata', component: Payment },
    { path: '/magazin', component: Shops },
    { path: '/uslugi', component: Service },
    { path: '/statii', component: ReviewList },
    { path: '/profil', component: Profile },

    //404 должна быть всегда последней!
    { path: '/:pathMatch(.*)*', component: NotFound }
]

export default createRouter({
    history: createWebHistory(),
    routes
})