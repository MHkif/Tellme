<template>
    <MainLayout>
        <!-- Navbar -->
        <NavBar />
        <!-- End Navbar -->
        <div class="flex w-full p-8 justify-between items-center">
            <h3 class="font-bold text-xl">Streams</h3>
            <router-link
                  to="/streamRoom"
                    class="flex justify-center rounded bg-gray-900 px-4 py-2 text-md font-semibold text-white hover:text-orange-600 hover:border hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                >
                    Launch a Stream
                </router-link>
        </div>
    </MainLayout>
</template>

<script setup>
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";
components: {
    MainLayout, NavBar;
}
</script>

<style></style>
