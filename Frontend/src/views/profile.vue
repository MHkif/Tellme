<template>
    <MainLayout>
        <!-- Navbar -->
        <NavBar />
        <!-- End Navbar -->

        <!-- Cover Section -->
        <CoverProfile />
        <!-- End Cover Section -->

        <!-- About Me Section -->
        <section class="w-full flex flex-col gap-6 p-8 md:flex-row">
            <!-- Experiences & About me -->
            <div class="w-full flex flex-col gap-6 md:w-[60%]">
                <AboutMe></AboutMe>
            </div>

            <!-- Location, website , email ... -->
            <div class="w-full flex flex-col gap-6 md:w-[40%]">
                <div class="w-full p-4 rounded-md bg-gray-100">
                    <h3 class="text-black font-medium">Location</h3>
                    <div class="py-2">
                        <h3 class="text-gray-700 font-semiBold">
                            Casablanca, Morocco .
                        </h3>
                    </div>
                </div>
                <div class="w-full p-4 rounded-md bg-gray-100">
                    <h3 class="text-black font-medium">Website</h3>
                    <div class="py-2">
                        <h3 class="text-gray-700 font-semiBold">
                            www.frankdeveone.dev
                        </h3>
                    </div>
                </div>
                <div class="w-full p-4 rounded-md bg-gray-100">
                    <h3 class="text-black font-medium">Email</h3>
                    <div class="py-2">
                        <h3 class="text-gray-700 font-semiBold">
                            frank@gmail.com
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Me Section -->

        <!-- My Playlist Section -->
        <ListScroll title="Popular Playlists">
            <PlayListCard />
        </ListScroll>
        <!-- End My Playlist Section -->

        <!-- My Podcasts  Section -->
        <PodcastsGrid title="My Podcasts">
            <PodcastCard></PodcastCard>
        </PodcastsGrid>
        <!-- End My Podcasts  Section -->
    </MainLayout>
</template>

<script setup>
import NavBar from "../components/NavBar.vue";
import SideBar from "../components/SideBar.vue";
import CoverProfile from "../components/CoverProfile.vue";
import PodcastCard from "../components/PodcastCard.vue";
import PodcastsGrid from "../components/PodcastsGrid.vue";
import PlayListCard from "../components/PlayListCard.vue";
import ListScroll from "../components/ListScroll.vue";
import MainLayout from "../components/MainLayout.vue";
import AboutMe from "../components/AboutMe.vue";
components: {
    MainLayout,
        NavBar,
        SideBar,
        CoverProfile,
        PodcastCard,
        PodcastsGrid,
        PlayListCard,
        ListScroll,
        AboutMe;
}
</script>

<style></style>
