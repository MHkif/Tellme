import { createStore } from "vuex";

const store = createStore({
  state: {
    token: localStorage.getItem("token") || "",
    id: localStorage.getItem("id") || "",
    user: JSON.parse(localStorage.getItem("user")) || {},
    play: localStorage.getItem("play") || false,
    podcasts: JSON.parse(localStorage.getItem("podcasts")) || [],
  },
  mutations: {
    setToken(state, token) {
      localStorage.setItem("token", token);
      state.token = token;
    },
    setPlay(state) {
      localStorage.setItem("play", true);
      state.play = true;
    },
    setPodcasts(state, podcasts) {
      localStorage.setItem("podcasts", JSON.stringify(podcasts));
      state.podcasts = podcasts;
    },

    clearPodcasts(state) {
      localStorage.removeItem("podcasts");
      state.podcasts = [];
    },

    clearPlay(state) {
      localStorage.removeItem("play");
      state.play = false;
    },
    setUser(state, user) {
      state.user = user;
      localStorage.setItem("user", JSON.stringify(user));
      localStorage.setItem("id", user.id);
      state.id = user.id;
    },
    clearToken(state) {
      localStorage.removeItem("token");
      localStorage.removeItem("id");
      localStorage.removeItem("play");
      localStorage.removeItem("user");
      localStorage.removeItem("podcasts");
      state.token = "";
      state.id = "";
      state.user = {};
      state.play = false;
      state.podcasts = [];
    },
  },
  getters: {},
  actions: {},
});

export default store;
