import { createStore, createLogger } from 'vuex';

import ProductCategory from './modules/ProductCategory';
import ProductSubCategory from './modules/ProductSubCategory';

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
        ProductSubCategory
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})