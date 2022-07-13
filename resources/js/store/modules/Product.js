const state = () => ({
    products: [],
    product: []
})

// getters
const getters = {
    getProducts(state) {
        return state.products;
    },
    getProduct(state) {
        return state.product;
    }
}

// actions
const actions = {
    initProducts(context) {
        axios.get("/api/product").then((response) => {
            context.commit("initProducts", response.data);
        });
    },
    addProduct(context, product) {
        const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }
        return axios.post("/api/product", product, config )
            .then((response) => {
                context.commit("addProduct", {
                    id: response.data.id,
                    ...product
                });
                return response.data;
            });
    },
    showProduct(context, id) {
        return axios.get("/api/product/"+id )
            .then(response => {
                context.commit("showProduct", response.data);
                return response.data;
            });
    },
    updateProduct(context,product) {
        const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }
        return axios.post(`/api/update-product`, product)
            .then(response => {
                context.commit("updateProduct", response.data);
                return response.data;
            });
    },
    deleteProduct(context, productID) {
        return axios
            .delete("/api/product/"+productID)
            .then((response) => {
                context.commit("deleteProduct", productID);
            });
    }
}

// mutations
const mutations = {
    initProducts(state, products) {
        state.products = products;
    },
    addProduct(state, product) {
        state.products.push(product);
    },
    showProduct(state, product) {
        state.product.pop();
        state.product.push(product);
    },
    updateProduct(state, product) {
        let index = state.products.findIndex((c) => c.id == product.id);
        if (index > -1) {
            state.products[index] = product;
        }
    },
    deleteProduct(state, productID) {
        let index = state.products.findIndex((c) => c.id == productID);
        if (index > -1) {
            state.products.splice(index, 1);
        }
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
