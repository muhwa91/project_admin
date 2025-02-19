import api from '../services/api.js';

export default {
    install: (app) => {
        app.config.globalProperties.$api = api;
    },
};
