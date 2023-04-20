<template>


  <div
    id="podcastItem"
    class="snap-start  sm:w-1/2 md:w-1/3 lg:w-1/4 bg-blue-50 bg-opacity-80 border border-gray-50 flex flex-col rounded-md shadow-sm overflow-hidden"
  >
    <div class="w-full h-full md:h-44 overflow-hidden p-1">
      <img
        class="w-full h-full rounded hover:ring-1 ring-orange-200 bg-gray-700 object-fit"
        :src="podcast.cover"
        alt=""
      />
    </div>

    <div class="w-full flex items-start justify-between px-3 py-4">
      <h3 class="customTitle text-gray-800 font-bold text-sm sm:text-md">
        {{ podcast.title }}
      </h3>
      <button class="text-white">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="ml-1 w-5 h-5 text-gray-800 fill-orange-50"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "SnapPodcast",
  props: ["podcast"],
};
</script>
