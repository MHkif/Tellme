<template>
    <!-- Hero Section -->
    <section
        class="  flex flex-col h-full justify-between items-center md:flex-row md:h-[80vh]"
    >
        <!-- Text Content -->
        <div
            class="w-full p-8 flex flex-col h-full space-y-10 justify-center md:w-1/2"
        >
            <p
                class="leading-8 text-2xl leading-relaxed font-medium md:text-5xl"
            >
                Listen to Your Favorite
                <span class="text-orange-600">Podcast</span> Anytime, Anywhere
            </p>
            <div class="w-full flex gap-12">
                <button
                    class="text-sm md:text-md font-medium py-2 px-4 rounded bg-orange-600 text-white"
                >
                    Get Started
                </button>
            </div>
        </div>
        <!-- End Text Content -->

        <!-- Image Section -->
        <div class="hidden h-full md:block">
            <img src="../assets/hero.svg" alt="" class="h-full" />
        </div>
        <!-- End Image Section -->
    </section>
    <!-- End Hero Section -->
</template>

<script>
export default {
    name: "Hero",
};
</script>
