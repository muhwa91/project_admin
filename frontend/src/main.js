import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router.js'; 
import store from './store/store.js'; 
import apiPlugin from './plugins/apiPlugin.js';
import storePlugin from "./plugins/storePlugin.js";
import './style.css';

const app = createApp(App);
app.use(router);
app.use(store);
app.use(apiPlugin);
app.use(storePlugin);
app.mount('#app');
