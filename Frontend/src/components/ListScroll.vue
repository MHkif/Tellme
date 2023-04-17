<template>
  <section class="w-full flex flex-col gap-6 p-8">
    <h3 class="text-xl font-medium">{{ title }}</h3>
    <div
      class="snap-start snap-x flex gap-8 snap-mandatory overflow-x-auto p-2 "
    >
      <slot
        >This is the default content if nothing gets specified inside
        PlayListScroll Compenent</slot
      >
    </div>
  </section>
</template>

<script>
export default {
  name: "ListScroll",
  props: ["title"],
};
</script>
