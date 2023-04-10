<template>
    <nav
        class="flex w-full justify-between items-center p-8 h-[4.3rem] "
    >
        <div
            class="py-1 px-4 bg-gray-900 rounded-s-none rounded-se-2xl rounded-es-2xl"
        >
            <h3 class="text-orange-600 text-lg font-bold">Tellme</h3>
        </div>

        <input
            placeholder="Search"
            type="text"
            name="search"
            class="hidden block w-80 px-3 py-1.5 text-gray-600 placeholder-gray-400 bg-white border border-orange-300 rounded-md focus:border-orange-400 focus:outline-none focus:ring focus:ring-orange-300 focus:ring-opacity-40 md:block"
        />

        <div class="flex gap-4">
            <!-- search -->
            <div class="p-1.5 rounded bg-orange-100">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-orange-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    />
                </svg>
            </div>

            <!-- notification -->
            <div class="p-1.5 rounded bg-orange-100">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-orange-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                    />
                </svg>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar",
};
</script>

<style scoped></style>
