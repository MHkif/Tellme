 import { createApp } from "vue";
import "./style.css";
import "vue-material-design-icons/styles.css";
import store from "./store";
import router from "./router";
import App from "./App.vue";

createApp(App).use(store).use(router).mount("#app");
