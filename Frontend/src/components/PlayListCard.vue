<template>
  <div
    class="relative snap-start min-w-full sm:min-w-[60%] flex flex-col  rounded-md bg-gray-800 border border-orange-200 md:min-w-[30%]  md:flex-row overflow-hidden"
  >
    <div class="w-full h-full bg-gray-700">
      <img
        class="w-full h-full object-fit"
        src="../assets/SophiaKianni_2021T-embed.png"
        alt=""
      />
    </div>
    <div class="fixed flex flex-col justify-between absolute h-full w-full p-4">
      <div class="flex justify-between items-center">
        <div class="rounded p-1 text-orange-600 shadow-sm text-xs bg-orange-900">
          20 Episodes
        </div>

       
      </div>

      <p class="customTitle font-bold text-white text-sm sm:text-md">
        Podcast Planning : How to evaluate your podcasts to rich the maximu ...
      </p>
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
<style scoped>
.customTitle {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  line-clamp: 2;
  -webkit-box-orient: vertical;
}
.modernWay {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  line-clamp: 1;
  -webkit-box-orient: vertical;
}

</style>