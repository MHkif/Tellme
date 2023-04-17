<template>
  <section class="w-full flex flex-col gap-6 p-8">
    <h3 class="text-xl font-medium">{{ title }}</h3>
    <div
      class="grid grid-cols sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xxl:grid-cols-3 gap-6"
    >
      <PodcastCard
        v-for="podcast in podcasts"
        :key="podcast.id"
        :podcast="podcast"
      />
    
    </div>
  </section>
</template>

<script>
import PodcastCard from "../components/PodcastCard.vue";

export default {
  name: "PodcastsGrid",
  components: {
    PodcastCard,
  },
  props: {
    podcasts: Array,
    title: String,
  },
};
</script>
