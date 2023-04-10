<template>
    <MainLayout>
        <!-- Navbar -->
        <NavBar />
        <!-- End Navbar -->
        <div
            id="videos"
            class="w-[100%] h-[80vh] p-8 justify-center items-center"
        >
            <video
                id="user-1"
                class="h-full w-full bg-gray-900 rounded"
                autoplay
                playsinline
            ></video>
          
        </div>
    </MainLayout>
</template>

<script setup>
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";
import { onMounted } from "vue";
components: {
    MainLayout, NavBar;
}
onMounted: {
    let localStream;
    let RemoteStream;

    let init = async () => {
        localStream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false,
        });
        document.getElementById("user-1").srcObject = localStream;
    };

    // init();
}
</script>

<style></style>
