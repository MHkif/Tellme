<template>
  <aside
    class="fixed left-0 top-0 z-50 sidebar min-h-screen w-[calc(3.35rem)] overflow-hidden hover:w-52 hover:bg-white hover:shadow-lg"
    style="background-color: #252525"
  >
    <div class="flex h-screen flex-col justify-between pb-6">
      <div>
        <!-- Profile -->
        <li class="min-w-max">
          <router-link
            to="/profile"
            aria-label="profile"
            class=" flex items-center px-1 text-white"
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
                Frank Deveone</span
              >
            </div>
          </router-link>
        </li>

        <ul class="mt-6 space-y-1 tracking-wide">
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
        </ul>
      </div>

      <div class="w-max -mb-3">
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
      </div>
    </div>
  </aside>
</template>

<script>
import axios from "axios";
import { Icon } from "@iconify/vue";
export default {
  name: "sideBar",
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
};
</script>

<style scoped>
.sidebar {
  transition: all 0.4s ease-in-out;
}
</style>
