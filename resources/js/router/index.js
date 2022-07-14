import { createRouter, createWebHistory } from 'vue-router';

import Home from '../views/Home.vue';
import Product from '../views/Product.vue';
import ProductDetail from '../views/ProductDetail.vue';
import Entertainment from '../views/Entertainment.vue';
import Contact from '../views/Contact.vue';
import Technology from '../views/Technology.vue';
import Life from '../views/Life.vue';
import PageNotFound from '../views/PageNotFound.vue';

import SignUp from '../views/auth/SignUp.vue';
import SignIn from '../views/auth/SignIn.vue';

import ArticleDetail from '../views/ArticleDetail.vue';

import Admin from '../layouts/Admin.vue';
import Master from '../layouts/Master.vue';

import ProductCategoryList from '../views/product_category/Index.vue';
import ProductSubCategoryList from '../views/product_sub_category/Index.vue';

import ProductList from '../views/product/Index.vue';
import CreateProducts from '../views/product/Create.vue';
import ShowProducts from '../views/product/Show.vue';
import EditProducts from '../views/product/Edit.vue';

import Dashboard from '../views/Dashboard.vue';

const routes = [
    {
        path: '/admin',
        component: Admin,
        children: [
            {
                path: '/dashboard',
                name: 'Dashboard',
                component: Dashboard
            },
            {
                path: '/product-categories',
                name: 'ProductCategoryList',
                component: ProductCategoryList
            },
            {
                path: '/product-sub-categories',
                name: 'ProductSubCategoryList',
                component: ProductSubCategoryList
            },
            {
                path: '/products',
                name: 'Products',
                component: ProductList
            },
            {
                path: '/create-products',
                name: 'Create Products',
                component: CreateProducts
            },
            {
                path: '/products/:id',
                name: 'Show Products',
                component: ShowProducts
            },
            {
                path: '/products/:id/edit',
                name: 'Edit Products',
                component: EditProducts
            }
        ]
    },
    {
        path: '/',
        component: Master,
        children: [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/products',
                name: 'products',
                component: Product
            },
            {
                path: '/products-detail/:id',
                name: 'product-detail',
                component: ProductDetail
            },
            {
                path: '/entertainment',
                name: 'entertainment',
                component: Entertainment
            },
            {
                path: '/technology',
                name: 'technology',
                component: Technology
            },
            {
                path: '/life',
                name: 'life',
                component: Life
            },
            {
                path: '/entertainment/:id',
                name: 'Entertainment',
                component: ArticleDetail
            },
            {
                path: '/contact',
                name: 'contact',
                component: Contact,
            },
            {
                path: '/signin',
                name: 'signin',
                component: SignIn,
            },
            {
                path: '/signup',
                name: 'signup',
                component: SignUp,
            },
        ]
    },
    {
        path: '/:catchAll(.*)*',
        name: "PageNotFound",
        component: PageNotFound,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router