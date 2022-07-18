const state = () => ({
    datas: [],
    data: []
})

// GETTERS
const getters = {
    getDatas(state) {
        return state.datas;
    },
    getData(state) {
        return state.data;
    }
}

// ACTIONS
const actions = {
    initDatas(context) {
        axios.get("/api/get-datas").then((response) => {
            context.commit("initDatas", response.data);
        });
    },
    fetchData(context,id) {
        axios.get("/api/get-data/"+ id).then((response) => {
            context.commit("fetchData", response.data);
        });
    },
    fetchDataByCategory(context,id) {
        axios.get("/api/get-products-by-category/"+ id).then((response) => {
            context.commit("fetchDataByCategory", response.data);
        });
    },
    fetchProductbySubCategory(context,id) {
        axios.get("/api/get-products-by-sub-category/"+ id).then((response) => {
            context.commit("fetchProductbySubCategory", response.data);
        });
    }
}

// MUTATIONS
const mutations = {
    initDatas(state, datas) {
        state.datas = datas;
    },
    fetchData(state, data) {
        state.data = data;
    },
    fetchDataByCategory(state, datas){
        state.datas = datas;
    },
    fetchProductbySubCategory(state, datas){
        state.datas = datas;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
