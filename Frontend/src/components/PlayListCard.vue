<template>
  <div
    class="relative snap-start min-w-full flex flex-col h-96 rounded-md bg-gray-800 border border-orange-200 md:min-w-[40%] md:h-52 md:flex-row overflow-hidden"
  >
    <div class="w-full h-full bg-gray-700">
      <img
        class="w-full h-full object-fit"
        src="../assets/SophiaKianni_2021T-embed.png"
        alt=""
      />
    </div>
    <div class="fixed flex flex-col justify-between absolute h-full w-full p-5">
      <div class="flex justify-between items-center">
        <div class="rounded p-1 text-white text-xs bg-orange-600">
          20 Episodes
        </div>

        <div class="flex items-center gap-2">
          <h3 class="text-white text-xs sm:text-sm">2,867</h3>
          <h3 class="text-white text-xs sm:text-sm">views</h3>
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
      </div>

      <h3 class="font-bold text-white text-sm sm:text-md">
        Podcast Planning : How to evaluate your podcasts to rich the maximu...
      </h3>
    </div>
  </div>
</template>

<script>
export default {
  name: "PlayListCard",
  props: [
    "id",
    "title",
    "cover",
    "category",
    "url",
    "desc",
    "duration",
    "date",
  ],
};
</script>
