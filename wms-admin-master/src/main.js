import {createApp} from "vue";
import {createPinia} from "pinia";
import App from "./App.vue";
import router from "./router";
import globalComponents from "./global-components";
import utils from "./utils";
import "./assets/css/app.css";
import axios from "axios";

const app = createApp(App).use(router).use(createPinia());

globalComponents(app);
utils(app);

app.mount("#app");

axios.defaults.withCredentials = true;
// // axios.defaults.baseURL = 'http://wms.test';
// axios.defaults.headers.common['Accept'] = 'application/json'
