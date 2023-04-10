<template>
  <div class="flex flex-col h-64">
    <div class="bg-gray-600 rounded-lg h-[80%]"></div>
    <div class="flex py-2">
      <router-link
        to="/profile"
        aria-label="profile"
        class="relative flex items-center px-1 text-white"
      >
        <div class="flex w-full items-center gap-3">
          <div
            class="flex w-10 h-10 mx-auto rounded-full  ring-1 ring-gray-900 hover:ring-orange-600 items-center justify-center overflow-hidden"
          >
            <img
              class="w-full h-full "
              src="../assets/italo.jpg"
              alt=""
            />
          </div>

          <span class="text-black"> Frank Deveone</span>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "ShoetVideoCard",
};
</script>
