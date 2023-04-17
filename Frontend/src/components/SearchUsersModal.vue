<template>
  <div
    v-show="this.modelOpen"
    class="fixed inset-0 z-50 overflow-y-auto"
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
        class="fixed h-full w-full inset-0 flex items-center transition-opacity blur-sm backdrop-blur-sm bg-gray/10"
        aria-hidden="true"
      ></div>

      <div
        v-show="this.modelOpen"
        class="inline-block w-full h-full my-auto md:my-[30vh] max-w-xl overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
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

        <form
          method="POST"
          action="/groups/myGroups/create"
          class="p-5 border-b border-gray-200"
        >
          <div class="flex gap-2 items-center justify-center">
            <input
              value=""
              placeholder="Aliens Homies"
              type="text"
              name="name"
              class="block w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
            />

            <button
              type="submit"
              class="p-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-orange-600 rounded dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:bg-blue-700 hover:bg-blue-600 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
              </svg>
            </button>
          </div>
        </form>
        <div>
          <div class="h-56 p-5 flex flex-col gap-4 overflow-y-auto">
            <h3 class="font-medium">All Users</h3>
            <DropdownUsers />
            <DropdownUsers />
            <DropdownUsers />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DropdownUsers from "./DropdownUsers.vue";

export default {
  name: "SearchUsersModal",
};
</script>
