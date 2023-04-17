import { createApp } from "vue";

import "./style.css";
import store from "./store";
import router from "./router";
import App from "./App.vue";

import Echo from "laravel-echo";
import Pusher from "pusher-js";
// window.Pusher = require("pusher-js");

window.Echo = new Echo({
  broadcaster: "pusher",
  key: "local",
  wsHost: "127.0.0.1",
  cluster: "mt1",
  wsPort: 6001,
  forceTLS: true,
  disableStats: true,
});
createApp(App).use(store).use(router).mount("#app");
