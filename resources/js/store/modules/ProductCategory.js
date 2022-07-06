const state = () => ({
    categories: [],
    category: []
})

// getters
const getters = {
    getCategories(state) {
        return state.categories;
    },
    getCategory(state) {
        return state.category;
    }
}

// actions
const actions = {
    initCategories(context) {
        axios.get("api/product-category").then((response) => {
            context.commit("initCategories", response.data.data);
        });
    },
    addCategories(context, category) {
        return axios.post("api/product-category", category )
            .then((response) => {
                context.commit("addCategory", {
                    id: response.data.insert_id,
                    ...category
                });
            });
    },
    showCategory(context, id) {
        axios.get("api/product-category/"+id )
            .then((response) => {
                context.commit("showCategory", response.data.data);
            });
    },
    updateCategories(context,category) {
        return axios
            .patch("api/product-category/" + category[0].id, category[0])
            .then((response) => {
                context.commit("updateCategory", response.data.data);
            });
    },
    deleteCategories(context, categoryID) {
        return axios
            .delete("api/product-category/"+categoryID)
            .then((response) => {
                context.commit("deleteCategory", categoryID);
            });
    }
}

// mutations
const mutations = {
    initCategories(state, categories) {
        state.categories = categories;
        console.log(categories);
    },
    addCategories(state, category) {
        state.categories.push(category);
    },
    showCategory(state, category) {
        state.category.push(category);
    },
    updateCategories(state, category) {
        let index = state.categories.findIndex((c) => c.id == category.id);
        if (index > -1) {
            state.categories[index] = category;
        }
    },
    deleteCategories(state, categoryID) {
        let index = state.categories.findIndex((c) => c.id == categoryID);
        if (index > -1) {
            state.categories.splice(index, 1);
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
