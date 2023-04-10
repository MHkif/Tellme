<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Side Bar -->
    <SideBar />
    <!-- End Side Bar -->

    <!-- Content -->
    <main class="w-[calc(100%-3.35rem)] ml-auto flex flex-col">
      <slot
        >This is the default content if nothing gets specified inside MainLayout
        Compenent</slot
      >
    </main>
    <!-- End Content -->
  </div>
</template>

<script>
import SideBar from "./SideBar.vue";
export default {
  name: "MainLayout",
  components: {
    SideBar,
  },
};
</script>

<style></style>
