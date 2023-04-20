<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Modal -->
    <div
      v-show="this.modelOpen"
      class="fixed inset-0 z-50"
      role="dialog"
      aria-modal="true"
    >
      <div
        class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0"
      >
        <div
          @click="this.modelOpen = false"
          v-show="this.modelOpen"
          class="fixed h-screen w-full inset-0 flex items-center transition-opacity blur-sm backdrop-blur-sm bg-gray/10"
          aria-hidden="true"
        ></div>

        <div
          v-show="this.modelOpen"
          class="inline-block w-full my-[30vh] max-w-xl overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
        >
          <!-- <div class="flex items-center justify-between space-x-4">
          

            <button
              @click="this.modelOpen = false"
              class="text-red-600 focus:outline-none hover:text-gray-700"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </button>
          </div> -->

          <div>
            <div class="max-h-56 p-5 flex flex-col gap-2 overflow-y-auto">
              <div
                class="flex items-center justify-between py-3 rounded w-full"
              >
                <div class="flex gap-3 items-center">
                  <div
                    class="h-10 w-10 overflow-hidden rounded-full bg-gray-600"
                  >
                    <img
                      class="h-full w-full object-fit"
                      src="../assets/jordan.jpg"
                      alt=""
                    />
                  </div>
                  <h3 class="font-medium">Frank Loyal is Calling ...</h3>
                </div>
                <div class="flex items-center gap-6">
                  <button class="p-2 rounded-full bg-red-600">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-6 h-6 text-white"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                      />
                    </svg>
                  </button>
                  <button class="p-2 rounded-full bg-green-500">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-6 h-6 text-white"
                    >
                      <path
                        stroke-linecap="round"
                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Side Bar -->
    <SideBar />
    <!-- End Side Bar -->

    <!-- Content -->
    <main class="w-[calc(100%-3.35rem)] ml-auto flex flex-col">
      <slot
        >This is the default content if nothing gets specified inside MainLayout
        Compenent</slot
      >
    </main>
    <!-- End Content -->
  </div>
</template>

<script>
import SideBar from "./SideBar.vue";
import { ref } from "vue";
import store from "../store";
export default {
  name: "MainLayout",
  props: ["user_notifications"],
  components: {
    SideBar,
  },

  data() {
    return {
      modelOpen: false,

      users: ref([]),
      notifications: ref([]),
    };
  },
  methods: {},
  mounted() {
    // this.notifications.value = props.user_notifications;
    // Echo.private("calling." + store.state.id).notification((notification) => {
    //   // this.notifications.value.push(notification.notification);
    //   console.log(notification);
    // });
    Echo.channel("test").listen("MyEvent", (event) => {
      console.log("Received event:", event);
    });
    console.log("++++++++++++++++++++++++++");
  },
};
</script>

<style></style>
