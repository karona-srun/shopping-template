const state = () => ({
    datas: [],
})

// GETTERS
const getters = {
    getDatas(state) {
        return state.datas;
    },
}

// ACTIONS
const actions = {
    initDatas(context) {
        axios.get("/api/dashboard").then((response) => {
            context.commit("initDatas", response.data);
        });
    },
}

// MUTATIONS
const mutations = {
    initDatas(state, datas) {
        state.datas = datas;
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
