import { createStore, createLogger } from 'vuex';

import ProductCategory from './modules/ProductCategory';
import ProductSubCategory from './modules/ProductSubCategory';
import Product from './modules/Product';
import Attachment from './modules/Attachment';

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
        Attachment
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})