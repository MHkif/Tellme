<template>
  <MainLayout>
    <!-- Navbar -->
    <NavBar />
    <!-- End Navbar -->
    <div>
      <div class="flex w-full p-8  justify-between items-center">
        <h3 class="font-bold text-xl">Discover</h3>
        <router-link
          to="/shortvideos/create"
          class="flex justify-center rounded bg-gray-900 px-4 py-2 text-md font-semibold text-white hover:text-orange-600 border border-white hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          Make a Video
        </router-link>
      </div>
      <div
      
        class="px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
      >
        <ShortVideoCard />
        <ShortVideoCard />
        <ShortVideoCard />
        <ShortVideoCard />
      </div>
  
    </div>
  </MainLayout>
</template>

<script>
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";
import ShortVideoCard from "../components/ShortVideoCard.vue";
export default {
  components: {
    MainLayout,
    NavBar,
    ShortVideoCard,
  },
  data() {
    return {
      isRecording: false,
    };
  },
};
</script>

<style></style>
