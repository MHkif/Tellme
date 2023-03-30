<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Side Bar -->

        <aside
            class="fixed left-0 top-0 z-99 sidebar min-h-screen w-[calc(3.35rem)] overflow-hidden border-r hover:w-56 hover:bg-white hover:shadow-lg"
            style="background-color: #252525"
        >
            <div class="flex h-screen flex-col justify-between pt-2 pb-6">
                <div class="group">
                    <img
                        class="w-10 group-hover:w-24 mx-auto rounded-full border-2 border-white"
                        src="https://avatars.githubusercontent.com/u/67946056?v=4"
                        alt=""
                    />
                    <div class="w-full p-2.5 text-center">
                        <span
                            class="hidden font-medium text-orange-600 text-center transition ease-out group-hover:block"
                        >
                            Frank Deveone
                        </span>
                    </div>
                    <ul class="mt-6 space-y-2 tracking-wide">
                        <li class="min-w-max">
                            <a
                                href="#"
                                aria-label="dashboard"
                                class="group relative flex items-center space-x-4 px-1 py-3 text-white"
                            >
                                <div
                                    class="flex w-full mr-2 items-center space-x-4 group-hover:bg-orange-50 group-hover:border group-hover:border-orange-600 rounded"
                                >
                                    <div
                                        class="flex items-center justify-center rounded border border-orange-600 group-hover:border-0 bg-orange-50 p-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            class="w-6 h-6 text-orange-600"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                            />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-orange-600"
                                        >Home</span
                                    >
                                </div>
                            </a>
                        </li>
                        <li class="min-w-max">
                            <a
                                href="#"
                                class="group flex items-center space-x-4 rounded-full p-3 text-gray-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                                >
                                    <path
                                        stroke-linecap="round"
                                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"
                                    />
                                </svg>

                                <span class="group-hover:text-orange-600"
                                    >Meeting</span
                                >
                            </a>
                        </li>
                        <li class="min-w-max">
                            <a
                                href="#"
                                class="group flex items-center space-x-4 rounded-md p-3 text-gray-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"
                                    />
                                </svg>

                                <span class="group-hover:text-orange-600"
                                    >Discover</span
                                >
                            </a>
                        </li>
                        <li class="min-w-max">
                            <a
                                href="#"
                                class="group flex items-center space-x-4 rounded-md p-3 text-gray-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9.348 14.651a3.75 3.75 0 010-5.303m5.304 0a3.75 3.75 0 010 5.303m-7.425 2.122a6.75 6.75 0 010-9.546m9.546 0a6.75 6.75 0 010 9.546M5.106 18.894c-3.808-3.808-3.808-9.98 0-13.789m13.788 0c3.808 3.808 3.808 9.981 0 13.79M12 12h.008v.007H12V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                    />
                                </svg>

                                <span class="group-hover:text-orange-600"
                                    >Streams</span
                                >
                            </a>
                        </li>
                        <li class="min-w-max">
                            <a
                                href="#"
                                class="group flex items-center space-x-4 rounded-md px-3 py-3 text-gray-200"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-orange-50 group-hover:text-orange-600"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"
                                    />
                                </svg>

                                <span class="group-hover:text-orange-600"
                                    >Speakers</span
                                >
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-max -mb-3">
                    <a
                        href="#"
                        class="group flex items-center space-x-4 rounded-md px-3 py-3 text-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 fill-orange-50 group-hover:fill-orange-600"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="group-hover:text-orange-600"
                            >Settings</span
                        >
                    </a>
                </div>
            </div>
        </aside>

        <!-- End Side Bar -->

        <!-- Content -->
        <main class="w-[calc(100%-3.35rem)] ml-auto flex flex-col">
            <!-- Navbar -->
            <nav
                class="w-full flex justify-between items-center p-8 h-[4.3rem]"
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
            <!-- End Navbar -->

            <!-- Hero Section -->
            <section
                class="flex flex-col h-full justify-between items-center md:flex-row md:h-[80vh]"
            >
                <!-- Text Content -->
                <div
                    class="w-full p-8 flex flex-col h-full space-y-10 justify-center  md:w-1/2"
                >
                    <p
                        class="leading-8 text-2xl leading-relaxed font-medium md:text-5xl"
                    >
                        Listen to Your Favorite
                        <span class="text-orange-600">Podcast</span> Anytime,
                        Anywhere
                    </p>
                    <div class="w-full flex gap-12">
                        <button
                            class="text-sm md:text-md font-medium py-2 px-4 rounded  bg-orange-600 text-white"
                        >
                            Get Started
                        </button>
                      
                    </div>
                </div>
                <!-- End Text Content -->

                <!-- Image Section -->
                <div class="h-full">
                    <img
                        src="../assets/hero.svg"
                        alt=""
                        class="hidden h-full md:block"
                    />
                </div>
                <!-- End Image Section -->
            </section>
            <!-- End Hero Section -->

            <!-- Popular Podcasts Section -->
            <section class="w-full flex flex-col gap-6 p-8">
                <h3 class="text-xl font-medium">Most Popular Podcasts</h3>
                <div
                    class="snap-start snap-x flex gap-8 h-44 snap-mandatory overflow-x-auto p-2"
                >
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                </div>
            </section>

            <!-- End Podcast Section -->

            <!-- Popular Playlist Section -->
            <section class="w-full flex flex-col gap-6 p-8">
                <h3 class="text-xl font-medium">Popular Playlists</h3>
                <div
                    class="snap-start snap-x flex gap-8 h-44 snap-mandatory overflow-x-auto p-2"
                >
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                    <div
                        class="snap-start min-w-[40%] flex flex-col h-full rounded-md border border-orange-200 md:flex-row overflow-hidden"
                    >
                        <div class="w-48 bg-gray-700"></div>
                        <div class="w-72 bg-blue-50"></div>
                    </div>
                </div>
            </section>

            <!-- End Playlist Section -->
        </main>
        <!-- End Content -->
    </div>
</template>

<script setup></script>

<style>
.sidebar {
    transition: all 0.4s ease-in-out;
}
</style>
