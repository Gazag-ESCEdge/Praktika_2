import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

import HomePage from '../pages/HomePage.vue'
import CatalogPage from '../pages/CatalogPage.vue'
import ProductPage from '../pages/ProductPage.vue'
import CartPage from '../pages/CartPage.vue'
import AboutPage from '../pages/AboutPage.vue'
import ContactsPage from '../pages/ContactsPage.vue'
import PaymentPage from '../pages/PaymentPage.vue'
import ShopsPage from '../pages/ShopsPage.vue'
import ServicePage from '../pages/ServicePage.vue'
import ArticleListPage from '../pages/ArticleListPage.vue'
import ArticleViewPage from '../pages/ArticleViewPage.vue'
import ProfilePage from '../pages/ProfilePage.vue'
import LoginPage from '../pages/LoginPage.vue'
import RegisterPage from '../pages/RegisterPage.vue'
import AnalysisPage from '../pages/AnalysisPage.vue'

import NotFoundPage from '../pages/NotFoundPage.vue'

const routes = [
    { path: '/', component: HomePage },
    { path: '/catalog', component: CatalogPage },
    { path: '/product/:id', component: ProductPage },
    { path: '/cart', component: CartPage, meta: { requiresAuth: true } },
    { path: '/about', component: AboutPage },
    { path: '/contacts', component: ContactsPage },
    { path: '/payment', component: PaymentPage },
    { path: '/shops', component: ShopsPage },
    { path: '/service', component: ServicePage },
    { path: '/articles', component: ArticleListPage },
    { path: '/articles/:id', component: ArticleViewPage },
    { path: '/profile', component: ProfilePage, meta: { requiresAuth: true } },
    { path: '/login', component: LoginPage },
    { path: '/register', component: RegisterPage },
    { path: '/analysis', component: AnalysisPage },

    //404 должна быть всегда последней!
    { path: '/:pathMatch(.*)*', component: NotFoundPage }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        }
        
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
                top: 80
            }
        }
        
        return { 
            top: 0, 
            left: 0,
            behavior: 'smooth'
        }
    }
})

router.beforeEach(async (to, from, next) => {

    if (!to.meta.requiresAuth) {
        return next()
    }

    try {
        await axios.get('/api/user')
        next()
    } catch (e) {
        next({
            path: '/login',
            query: { redirect: to.fullPath }
        })
    }
})

export default router