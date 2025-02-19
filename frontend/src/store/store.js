import { createStore } from 'vuex';

export default createStore({
    state: {
        message: 'Hello from Vuex!',
    },
    mutations: {
        setMessage(state, newMessage) {
            state.message = newMessage;
        },
    },
    actions: {
        updateMessage({ commit }, newMessage) {
            commit('setMessage', newMessage);
        },
    },
    getters: {
        getMessage: (state) => state.message,
    },
});
