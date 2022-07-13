const state = () => ({
    subCategories: [],
    subCategory: [],
    listSubCategory: []
})

// getters
const getters = {
    getSubCategories(state) {
        return state.subCategories;
    },
    getSubCategory(state) {
        return state.subCategory;
    }
}

// actions
const actions = {
    initSubCategories(context) {
        axios.get("/api/product-sub-category").then((response) => {
            context.commit("initSubCategories", response.data.data);
        });
    },
    getSubCategories(context) {
        axios.get("/api/get-list-sub-category").then((response) => {
            context.commit("getSubCategories", response.data.data);
        });
    },
    addSubCategories(context, category) {
        return axios.post("/api/product-sub-category", category )
            .then((response) => {
                context.commit("addSubCategory", {
                    id: response.data.insert_id,
                    ...category
                });
            });
    },
    showSubCategory(context, id) {
        axios.get("/api/product-sub-category/"+id )
            .then((response) => {
                context.commit("showSubCategory", response.data.data);
            });
    },
    updateSubCategories(context,category) {
        console.log(...category);
        return axios
            .patch("/api/product-sub-category/" + category[0].id, category[0])
            .then((response) => {
                context.commit("updateSubCategory", response.data.data);
            });
    },
    deleteSubCategories(context, categoryID) {
        return axios
            .delete("/api/product-sub-category/"+categoryID)
            .then((response) => {
                context.commit("deleteSubCategory", categoryID);
            });
    }
}

// mutations
const mutations = {
    initSubCategories(state, subCategories) {
        state.subCategories = subCategories;
    },
    getSubCategories(state, listSubCategories) {
        state.listSubCategories = listSubCategories;
    },
    addSubCategories(state, subCategory) {
        state.subCategories.push(subCategory);
    },
    showSubCategory(state, subCategory) {
        state.subCategory.push(subCategory);
    },
    updateSubCategories(state, category) {
        let index = state.subCategories.findIndex((c) => c.id == category.id);
        if (index > -1) {
            state.subCategories[index] = category;
        }
    },
    deleteSubCategories(state, categoryID) {
        let index = state.categories.findIndex((c) => c.id == categoryID);
        if (index > -1) {
            state.subCategories.splice(index, 1);
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
