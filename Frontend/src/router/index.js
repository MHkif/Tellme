import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Home from "../views/Home.vue";
import Profile from "../views/profile.vue";
import Streams from "../views/Streams.vue";
import Podcasts from "../views/Podcasts.vue";
import StreamRoom from "../views/StreamRoom.vue";
import Meeting from "../views/Meeting.vue";
import Discover from "../views/Discover.vue";
import ShortVideos from "../views/ShortVideos.vue";

const routes = [
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/register",
    name: "register",
    component: Register,
  },
  {
    path: "/profile",
    name: "profile",
    component: Profile,
  },
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/meeting",
    name: "meeting",
    component: Meeting,
  },
  {
    path: "/discover",
    name: "discover",
    component: Discover,
  },
  {
    path: "/streams",
    name: "streams",
    component: Streams,
  },
  {
    path: "/podcasts",
    name: "podcasts",
    component: Podcasts,
  },
  {
    path: "/streamRoom",
    name: "streamRoom",
    component: StreamRoom,
  },

  {
    path: "/shortvideos/create",
    name: "recordvideos",
    component: ShortVideos,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
