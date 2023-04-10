<template>
    <section
        class="flex flex-col relative items-center justify-center w-full p-3 mb-44 h-[38vh] md:px-8 md:h-[44vh]"
    >
        <div class="flex rounded-t-xl bg-red-200 w-full h-full overflow-hidden">
            <img
                src="../assets/cover.jpg"
                alt=""
                class="h-full w-full self-center object-cover"
            />
        </div>
        <div
            class="flex flex-col items-center justify-center gap-6 absolute -bottom-36 md:-bottom-24 md:flex-row md:left-16"
        >
            <img
                src="../assets/italo.jpg"
                alt=""
                class="h-40 w-40 self-center rounded-full border-2 border-orange-600 object-fit"
            />
            <div
                class="flex flex-col items-center justify-center md:items-start md:mt-8"
            >
                <h3 class="text-gray-900 font-bold text-lg">Frank Deveone</h3>
                <h3 class="text-gray-400">
                    I am a Software Engineer in Casablanca
                </h3>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "CoverProfile",
};
</script>
