import { createStore, createLogger } from 'vuex';

import ProductCategory from './modules/ProductCategory';
import ProductSubCategory from './modules/ProductSubCategory';
import Product from './modules/Product';

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
        Product
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})