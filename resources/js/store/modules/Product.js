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
        axios.get("api/product").then((response) => {
            context.commit("initCategories", response.data.data);
        });
    },
    addProduct(context, product) {
        return axios.post("api/product", product )
            .then((response) => {
                context.commit("addProduct", {
                    id: response.data.id,
                    ...product
                });
            });
    },
    showProduct(context, id) {
        axios.get("api/product/"+id )
            .then((response) => {
                context.commit("showProduct", response.data.data);
            });
    },
    updateProduct(context,product) {
        return axios
            .patch("api/product/" + product[0].id, product[0])
            .then((response) => {
                context.commit("updateProduct", response.data.data);
            });
    },
    deleteProduct(context, productID) {
        return axios
            .delete("api/product/"+productID)
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
