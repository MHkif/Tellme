<template>
  <aside
    class="fixed left-0 top-0 z-40 sidebar min-h-screen w-[3.35rem] overflow-hidden hover:w-56 hover:bg-white hover:shadow-lg"
    style="background-color: #252525"
  >
    <div class="flex h-screen flex-col justify-between pb-4">
      <div>
        <!-- Profile -->
        <li class="min-w-max">
          <router-link
            to="/profile"
            aria-label="profile"
            class="flex items-center px-1 text-white"
          >
            <div class="flex w-full items-center space-x-4">
              <div class="flex items-center justify-center">
                <img
                  class="w-10 h-10 mx-auto rounded-full border-2 border-gray-600 hover:border-orange-600"
                  src="../assets/italo.jpg"
                  alt=""
                />
              </div>

              <span class="font-medium text-white hover:text-orange-600">
                {{ user.first_name }} {{ user.last_name }}</span
              >
            </div>
          </router-link>
        </li>

        <ul class="mt-5 space-y-1 tracking-wide">
          <li class="min-w-max">
            <router-link
              to="/"
              aria-label="home"
              class="group relative flex items-center space-x-4 px-1 py-1 text-white"
            >
              <div
                active-class="bg-orange-50 border border-orange-600 rounded"
                class="flex w-full mr-2 items-center space-x-4 group-hover:bg-orange-50 rounded"
              >
                <div
                  active-class="border border-orange-600"
                  class="flex items-center justify-center rounded p-2"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="w-6 h-6 text-orange-600"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                  </svg>
                </div>
                <span class="font-medium text-orange-600">Home</span>
              </div>
            </router-link>
          </li>

          <li class="min-w-max">
            <router-link
              to="/meeting"
              aria-label="meeting"
              class="group relative flex items-center space-x-4 p-1 text-white"
            >
              <div class="group flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  stroke-width="1.5"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                >
                  <path
                    stroke-linecap="round"
                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"
                  />
                </svg>
              </div>
              <span class="flex items-center group-hover:text-orange-600"
                >Meeting</span
              >
            </router-link>
          </li>

          <li class="min-w-max">
            <router-link
              to="/discover"
              aria-label="meeting"
              class="group relative flex items-center space-x-4 p-1 text-white"
            >
              <div class="group flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"
                  />
                </svg>
              </div>
              <span class="group-hover:text-orange-600 group-hover:font-medium"
                >Discover</span
              >
            </router-link>
          </li>

          <li class="min-w-max">
            <router-link
              to="/podcasts"
              aria-label="meeting"
              class="group relative flex items-center space-x-4 p-1 text-white"
            >
              <div class="group flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  class="w-6 h-6 fill-orange-50 group-hover:fill-orange-600"
                >
                  <circle cx="12.01" cy="12" r="2"></circle>
                  <path d="M11.01 22h2l.5-7h-3l.5 7z"></path>
                  <path
                    d="M12 2a10 10 0 0 0-2.45 19.68l-.15-2.12a8 8 0 1 1 5.21 0l-.15 2.12A10 10 0 0 0 12 2z"
                  ></path>
                  <path
                    d="M15.32 9.61a3.44 3.44 0 0 1 .37.68 3.83 3.83 0 0 1 .23.75 3.57 3.57 0 0 1 .09.8 3.66 3.66 0 0 1-.09.81 3.83 3.83 0 0 1-.23.75 3.44 3.44 0 0 1-.37.68 4.7 4.7 0 0 1-.35.43l-.19 2.62a5.33 5.33 0 0 0 .58-.31A5.86 5.86 0 0 0 17 15.2a5.57 5.57 0 0 0 .55-1 5.89 5.89 0 0 0 .35-1.13 6.06 6.06 0 0 0 .1-1.23 6.22 6.22 0 0 0-.13-1.21A6.09 6.09 0 0 0 17 8.49a6.29 6.29 0 0 0-.73-.89 5.67 5.67 0 0 0-.89-.73 6.3 6.3 0 0 0-1-.56A6.17 6.17 0 0 0 13.21 6a6.11 6.11 0 0 0-2.41 0 5.51 5.51 0 0 0-1.13.36 5.57 5.57 0 0 0-1 .55 5.67 5.67 0 0 0-.89.73 6.29 6.29 0 0 0-.78.85 6.09 6.09 0 0 0-.9 2.14 6.21 6.21 0 0 0-.1 1.21 6.06 6.06 0 0 0 .12 1.21 5.89 5.89 0 0 0 .35 1.13 5.57 5.57 0 0 0 .55 1 6.24 6.24 0 0 0 1.62 1.62 5.33 5.33 0 0 0 .58.31L9 14.51a4.7 4.7 0 0 1-.35-.43 3.44 3.44 0 0 1-.37-.68 3.83 3.83 0 0 1-.23-.75 3.65 3.65 0 0 1-.05-.81 3.56 3.56 0 0 1 .08-.8 3.83 3.83 0 0 1 .23-.75 3.44 3.44 0 0 1 .37-.68 4 4 0 0 1 .5-.61 3.87 3.87 0 0 1 .59-.48 3.44 3.44 0 0 1 .68-.37 3.86 3.86 0 0 1 .75-.24 4.36 4.36 0 0 1 1.61 0 3.86 3.86 0 0 1 .75.24 3.58 3.58 0 0 1 1.27.85 3.49 3.49 0 0 1 .49.61z"
                  ></path>
                </svg>
              </div>
              <span class="group-hover:text-orange-600 group-hover:font-medium"
                >Podcasts</span
              >
            </router-link>
          </li>

          <li class="min-w-max">
            <router-link
              to="/streams"
              aria-label="meeting"
              class="group relative flex items-center space-x-4 p-1 text-white"
            >
              <div class="group flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.348 14.651a3.75 3.75 0 010-5.303m5.304 0a3.75 3.75 0 010 5.303m-7.425 2.122a6.75 6.75 0 010-9.546m9.546 0a6.75 6.75 0 010 9.546M5.106 18.894c-3.808-3.808-3.808-9.98 0-13.789m13.788 0c3.808 3.808 3.808 9.981 0 13.79M12 12h.008v.007H12V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                  />
                </svg>
              </div>
              <span class="group-hover:text-orange-600 group-hover:font-medium"
                >Streams</span
              >
            </router-link>
          </li>

          <li class="min-w-max">
            <router-link
              to="/speakers"
              aria-label="meeting"
              class="group relative flex items-center space-x-4 p-1 text-white"
            >
              <div class="group flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"
                  />
                </svg>
              </div>
              <span class="group-hover:text-orange-600 group-hover:font-medium"
                >Speakers</span
              >
            </router-link>
          </li>
          <li class="min-w-max">
            <router-link
              to="/settings"
              class="group flex items-center space-x-4 p-1 text-white"
            >
              <div class="flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 fill-orange-50 group-hover:fill-orange-600"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <span class="group-hover:text-orange-600">Settings</span>
            </router-link>
          </li>
          <li class="min-w-max">
            <a
              @click="logout"
              class="group flex items-center space-x-4 p-1 text-white"
            >
              <div class="flex items-center justify-center rounded p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                  />
                </svg>
              </div>
              <span class="group-hover:text-orange-600">Log Out</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- <div class="w-max -mb-3">
        <router-link
          to="/settings"
          class="group flex items-center space-x-4 p-1 text-white"
        >
          <div class="flex items-center justify-center rounded p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 fill-orange-50 group-hover:fill-orange-600"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <span class="group-hover:text-orange-600">Settings</span>
        </router-link>
        <a
          @click="logout"
          class="group flex items-center space-x-4 p-1 text-white"
        >
          <div class="flex items-center justify-center rounded p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
              />
            </svg>
          </div>
          <span class="group-hover:text-orange-600">Log Out</span>
        </a>
      </div> -->

      <div :class="this.$store.state.collapse ? '' : 'hidden'" class="w-max">
        <div class="flex items-center space-x-4 p-1 text-white">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
              <div class="overflow-hidden rounded-xl p-0.5">
                <img
                  id="footerImg"
                  class="h-10 w-10 flex-shrink-0"
                  src="../assets/cover.jpg"
                  alt=""
                />
              </div>
              <div class="mr-4 space-y-2">
                <div
                  id="footerTitle"
                  class="text-sm text-gray-400 text-line-clamp-1 font-semibold"
                >
                  Podcast
                </div>
                <div
                  id="footerAlbum"
                  class="text-xs text-gray-600 text-line-clamp-1"
                >
                  Speaker
                </div>
              </div>
            </div>
            <div class="flex items-center justify-center">
              <button id="previous" class="w-5 h-5 text-white">
                <svg
                  class="fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path d="M4 5h3v10H4V5zm12 0v10l-9-5 9-5z" />
                </svg>
              </button>

              <button
                id="pause"
                class="hidden w-7 h-7 border border-black rounded-full flex text-white"
              >
                <svg
                  class="fill-current h-5 w-5 m-auto"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path d="M5 4h3v12H5V4zm7 0h3v12h-3V4z" />
                </svg>
              </button>

              <button id="play" class="rounded-full flex text-white">
                <svg
                  class="fill-current h-7 w-7 m-auto"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z"
                    fill="currentColor"
                  />
                  <path
                    d="M16 12L10 16.3301V7.66987L16 12Z"
                    fill="currentColor"
                  />
                </svg>
              </button>

              <button id="next" class="w-5 h-5 text-white mr-6">
                <svg
                  class="fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path d="M13 5h3v10h-3V5zM4 5l9 5-9 5V5z" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
</template>

<script>
import axios from "axios";
import { Icon } from "@iconify/vue";
// import store from "../store";

export default {
  name: "sideBar",
  data() {
    return {
      user: {},
      show: this.$store.state.play,
    };
  },
  methods: {
    logout() {
      axios
        .post("http://127.0.0.1:8000/api/v1/logout", {
          token: this.$store.state.token,
        })
        .then((res) => {
          this.$store.commit("clearToken");
          this.$router.push("/login");
        });
    },
  },
  mounted() {
    this.user = this.$store.state.user;
    // console.log("User : ", this.$store.state.user);
  },
};
</script>

<style scoped>
.sidebar {
  transition: all 0.4s ease-in-out;
}
</style>
