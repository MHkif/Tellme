<template>
  <MainLayout>
   
    <!-- Navbar -->
    <NavBar />
    <!-- End Navbar -->
    <div class="flex w-full p-8 justify-end items-center">
      <!-- <h3 class="font-bold text-xl">Podcasts</h3> -->
      <Button
        @click="this.modelOpen = true"
        class="flex justify-center rounded bg-gray-900 px-4 py-2 text-md font-semibold text-white hover:text-orange-600 border border-white hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
      >
        Create Podcast
      </Button>
    </div>

    <!--  Podcasts  Section -->
    <PodcastsGrid title="Most Populat Podcasts" :podcasts="podcasts">
    </PodcastsGrid>
    <!-- End  Podcasts  Section -->
  </MainLayout>
</template>

<script>
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";
import PodcastCard from "../components/PodcastCard.vue";
import axios from "axios";
import PodcastsGrid from "../components/PodcastsGrid.vue";
import { ref } from "vue";
export default {
  components: {
    MainLayout,
    NavBar,
    PodcastCard,
    PodcastsGrid,
  },

  data() {
    return {
      podcasts: [],
    
    };
  },

  methods: {
    
    getPodcasts() {
      axios
        .get("http://127.0.0.1:8000/api/v1/podcasts")
        .then((response) => {
          console.log("Response Data : ", response);
          if (response.data) {
            this.podcasts = response.data.data;
          }
        })
        .catch((error) => {
          console.log("Error :", error.response);
        });
    },
  },
  mounted() {
    this.getPodcasts();
  },
};


</script>

<style></style>
