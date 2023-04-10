import { createStore } from "vuex";

const store = createStore({
  state: {
    token: localStorage.getItem("token") || "",
  },
  mutations: {
    setToken(state, token) {
      localStorage.setItem("token", token);
      state.token = token;
    },
    clearToken(state) {
      localStorage.removeItem("token");
      state.token = "";
    },
  },
  getters: {},
  actions: {},
});

export default store;
