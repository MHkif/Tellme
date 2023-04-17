<template>
  <div class="p-3 bg-gray-50 rounded w-full">
    <div class="h-10 w-10 overflow-hidden rounded-full bg-gray-600">
      <img class="h-full w-full object-fit" src="../assets/{{image}}" alt="" />
    </div>
    <h1>{{ image }}</h1>
  </div>
</template>
<script>
export default {
  name: "DropdownUsers",
  props: ["image"],
};
</script>
<style></style>
