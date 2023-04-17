<template>
  <div
    class="fixed inset-0 z-50"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
  >
    <div
      class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0"
    >
      <div
        @click="this.modelOpen = false"
        v-show="this.modelOpen"
        class="fixed w-full inset-0 flex items-center transition-opacity blur-sm backdrop-blur-sm bg-gray/10"
        aria-hidden="true"
      ></div>

      <div
        v-show="this.modelOpen"
        class="inline-block w-full my-[30vh] max-w-xl overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
      >
        <div>
          <div class="max-h-56 p-5 flex flex-col gap-2 overflow-y-auto">
            <h3 class="text-sm font-medium">All Users</h3>
            <div
              class="flex items-center justify-between py-3 rounded w-full"
              v-for="user in users"
              :key="user.id"
            >
              <div class="flex gap-3 items-center">
                <div class="h-8 w-8 overflow-hidden rounded-full bg-gray-600">
                  <img
                    class="h-full w-full object-fit"
                    src="../assets/jordan.jpg"
                    alt=""
                  />
                </div>
              </div>
              <button>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 hover:fill-orange-600"
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
</template>

<script>
export default {
  name: "CallingCard",
  props: ["user", "user_notifications"],
  setup(props) {
    let users = ref([]);
    let notifications = ref([]);
    onMounted(() => {
      notifications.value = props.user_notifications;
      console.log(notifications.value);
    });
    Echo.private("calling." + props.user.id).notification((notification) => {
      notifications.value.push(notification.notification);
      console.log(notification);
    });
    return {
      notifications,
    };
  },
};
</script>
