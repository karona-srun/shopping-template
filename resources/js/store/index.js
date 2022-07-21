import { createStore, createLogger } from 'vuex';

import ProductCategory from './modules/ProductCategory';
import ProductSubCategory from './modules/ProductSubCategory';
import Product from './modules/Product';
import Attachment from './modules/Attachment';
import Home from './modules/Home';
import Dashboard from './modules/Dashboard';

const debug = process.env.NODE_ENV !== 'production'

export default createStore({
    state: {
        
    },
    mutations: {
        
    },
    actions: {
    
    },
    getters: {
    
    },
    modules: {
        ProductCategory,
        ProductSubCategory,
        Product,
        Attachment,
        Home,
        Dashboard
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})