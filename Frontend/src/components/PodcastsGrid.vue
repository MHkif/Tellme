<template>
    <section class="w-full flex flex-col gap-6 p-8">
        <h3 class="text-xl font-medium">{{ title }}</h3>
        <div class="grid grid-cols md:grid-cols-2 gap-6">
            <slot
                >This is the default content if nothing gets specified to go
                here</slot
            >
        </div>
    </section>
</template>

<script>
export default {
    name: "PodcastsGrid",
    props: ["title"],
};
</script>
