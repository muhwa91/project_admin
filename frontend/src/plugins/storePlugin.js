import store from "../store/store.js";

export default {
    install: (app) => {
        app.config.globalProperties.$store = store;
    },
};