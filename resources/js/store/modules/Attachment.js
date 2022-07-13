const state = () => ({
    attachments: [],
    attachment: []
})

// getters
const getters = {
    getAttachments(state) {
        return state.attachments;
    },
    getAttachment(state) {
        return state.attachment;
    }
}

// actions
const actions = {
    initAttachments(context, attachment) {
        axios.post("/api/get-attachments", attachment).then((response) => {
            context.commit("initAttachments", response.data);
        });
    },
    addAttachment(context, product) {
        console.log(...product)
        const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }
        return axios.post("/api/attachments", product, config )
            .then((response) => {
                context.commit("addAttachment", {
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
    deleteAttachment(context, productID) {
        return axios
            .delete("/api/attachments/"+productID)
            .then((response) => {
                context.commit("deleteAttachment", productID);
            });
    }
}

// mutations
const mutations = {
    initAttachments(state, attachments) {
        state.attachments = attachments;
    },
    addAttachment(state, attachment) {
        state.attachments.push(attachment);
    },
    showProduct(state, product) {
        state.product.pop();
        state.product.push(product);
    },
    deleteAttachment(state, productID) {
        let index = state.attachments.findIndex((c) => c.id == productID);
        if (index > -1) {
            state.attachments.splice(index, 1);
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
