<template>
  <div
    class="snap-start min-w-full md:min-w-[40%] flex flex-col h-96 md:h-52 rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
  >
    <!-- <div class="w-full h-full bg-gray-700 md:w-[40%]"></div> -->
    <div class="w-full h-full bg-gray-700 lg:w-[40%]">
      <img
        class="w-full h-full object-cover"
        src="../assets/SophiaKianni_2021T-embed.png"
        alt=""
      />
    </div>
    <div
      class="w-full h-full flex flex-col justify-between bg-blue-50 p-4 md:w-[60%]"
    >
      <div class="flex justify-between items-center">
        <h3 class="text-xs text-orange-500 font-medium sm:text-sm">
          Episode {{ podcast.id }}
        </h3>
        <div class="p-0.5 bg-orange-600 rounded">
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
        </div>
      </div>
      <div class="flex flex-col gap-2 sm:gap-4">
        <h3 class="font-bold text-sm sm:text-md">
            {{ podcast.title }}
        </h3>
        <h3 class="text-gray-500 text-xs sm:text-sm">
          This course discuss the main principales of the humaain nervous system
        </h3>
      </div>
      <div class="flex items-center gap-2">
        <!-- <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          class="fill-black"
        >
          <path
            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
          ></path>
          <path d="m9 17 8-5-8-5z"></path>
        </svg> -->

        <h3 class="text-gray-800 text-xs sm:text-sm font-medium">2,867</h3>
        <h3 class="text-gray-900 text-xs sm:text-sm">views</h3>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SnapPodcast",
  props: ["podcast"],
};
</script>
