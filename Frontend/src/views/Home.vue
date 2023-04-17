<template>
  <div>
    <div
      v-if="loading"
      class="flex min-h-full w-full justify-center items-center"
    >
      <h2 class="text-xxl">Loading...</h2>
    </div>

    <MainLayout v-else>
      <!-- Navbar -->
      <NavBar />
      <!-- End Navbar -->

      <Hero></Hero>

      <!--  Podcasts Section -->
      <ListScroll title="Popular Podcasts Episodes">
        <SnapPodcast
          v-for="podcast in podcasts"
          :key="podcast.id"
          :podcast="podcast"
        />
      </ListScroll>
      <!-- End  Podcasts Section -->

      <!--  Playlist Section -->
      <ListScroll title="Popular Playlists">
        <PlayListCard />
        <PlayListCard />
        <PlayListCard />
      </ListScroll>
      <!-- End  Playlist Section -->
      
      <!--  Podcasts  Section -->
      <PodcastsGrid
        title="Most Populat Podcasts"
        :podcasts="podcasts"
        @click="this.$emit('playPodcast', podcast)"
      >
      </PodcastsGrid>
      <!-- End  Podcasts  Section -->
      <div class="my-16"></div>
      <AudioPlayer :podcast="podcast"/>
    </MainLayout>
  </div>
</template>

<script>
import axios from "axios";
import MainLayout from "../components/MainLayout.vue";
import NavBar from "../components/NavBar.vue";
import Hero from "../components/Hero.vue";
import PodcastCard from "../components/PodcastCard.vue";
import PodcastsGrid from "../components/PodcastsGrid.vue";
import PlayListCard from "../components/PlayListCard.vue";
import ListScroll from "../components/ListScroll.vue";
import SnapPodcast from "../components/SnapPodcast.vue";
import Swal from "sweetalert2";
import AudioPlayer from "../components/AudioPlayer.vue";

export default {
  components: {
    MainLayout,
    NavBar,
    PodcastCard,
    PodcastsGrid,
    PlayListCard,
    ListScroll,
    SnapPodcast,
    AudioPlayer,
    Hero,
  },
  data() {
    return {
      loading: true,
      podcasts: [],
      podcast : this.$store.state.podcasts
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
    if (this.$store.state.token !== "") {
      axios
        .post("http://127.0.0.1:8000/api/v1/checkToken", {
          token: this.$store.state.token,
        })
        .then((res) => {
          if (res.data.status == "Expired") {
            // this.$store.commit("setToken", res.data.token);
            Swal.fire({
              title: "Your session has expired",
              text: "Please log in again to continue using the app .",
              confirmButtonText: "Login",
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                this.$router.push("/login");
              } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
              }
            });
          }
          this.loading = false;
        })
        .catch((err) => {
          this.loading = false;
          //   this.$store.commit("clearToken");
          this.$router.push("/login");
        });
    } else {
      this.loading = false;
      this.$router.push("/login");
    }
  },
};
</script>

<style></style>
