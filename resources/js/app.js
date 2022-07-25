require('./bootstrap');
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index.js';
import store from './store';

const app = createApp(App);

// app.config.productionTip = false;
// app.config.devtools = false;


import { initialize } from "./helpers/general";
initialize(store, router);

app.use(router);
app.use(store);
app.mount('#app');