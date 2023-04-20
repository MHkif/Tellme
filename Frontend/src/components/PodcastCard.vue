<template>
  <div
    @click="play"
    id="podcast"
    class="flex flex-col lg:h-52 rounded-md border border-orange-200 lg:flex-row overflow-hidden"
  >
    <div class="w-full h-full bg-gray-700 lg:w-[40%]">
      <img class="w-full h-full object-fit" :src="podcast.cover" alt="" />
    </div>

    <div
      class="px-3 w-full h-full flex flex-col justify-between gap-2 sm:px-5 py-4 bg-gray-100 lg:w-[60%]"
    >
      <div class="flex justify-between items-center">
        <h3 class="text-xs text-orange-500 font-medium sm:text-sm">
          Episode {{ podcast.id }}
        </h3>
        <button class="p-0.5 bg-orange-600 rounded">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="w-4 h-4 sm:w-6 sm:h-6 fill-white"
          >
            <path
              d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
            ></path>
            <path d="m9 17 8-5-8-5z"></path>
          </svg>
        </button>
      </div>
      <div class="flex flex-col gap-2 sm:gap-4">
        <h3 class="font-bold text-sm sm:text-md">
          Learning Strategy : How instead of What ?
        </h3>
        <h3 class="text-gray-500 text-xs sm:text-sm">
          This course discuss the main principales of the humaain nervous system
        </h3>
      </div>
   
    </div>
  </div>
</template>

<script>
export default {
  name: "PodcastCard",
  props: ["podcast"],
  methods: {
    play() {
      this.$store.commit("setPlay");
      this.$store.commit("setPodcasts", this.podcast);
      // alert(this.podcast);
    },
  },
};
</script>
