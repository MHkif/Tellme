<template>
    <div class="flex min-h-full items-center">
        <div class="relative hidden w-[40%] h-screen md:flex">
            <div
                class="absolute -top-40 -left-32 rounded-full border border-orange-600 bg-orange-50"
                style="height: 650px; width: 650px"
            >
           
            </div>
            
            <div
                class="absolute -top-40 -left-32 rounded-full border border-orange-600 bg-gray-900"
                style="height: 620px; width: 620px"
            >

           
            </div>
        </div>

        <!-- Right Side Form -->
        <div class="z-20 w-full flex flex-col h-screen space-y-8 py-4 px-8 md:w-[60%]">
            <div class="flex items-center justify-end gap-4 w-full">
                <h3 class="block text-md text-gray-600">Not a member ?</h3>
                <button
                    type="submit"
                    class="flex justify-center rounded-md bg-orange-600 px-4 py-2 text-md font-semibold text-white hover:text-orange-600 hover:bg-white hover:border hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                >
                    Sign Up
                </button>
            </div>

            <div
                class="flex flex-col items-center justify-center h-full space-y-8"
            >
                <div>
                    <h2
                        class="mt-6 text-center text-3xl font-medium tracking-tight text-gray-900"
                    >
                        Sign in to Tellme Univers
                    </h2>
                </div>
                <form class="space-y-4 w-1/2" action="#" method="POST">
                    <input type="hidden" name="remember" value="true" />
                    <div class="space-y-4 rounded-md">
                        <div class="space-y-2">
                            <label for="email-address" class="pl-2 font-medium"
                                >Email</label
                            >
                            <input
                                id="email-address"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required=""
                                class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"
                                placeholder="Enter Your Email"
                            />
                        </div>
                        <div class="space-y-2">
                            <label for="password" class="pl-2 font-medium"
                                >Password</label
                            >
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required=""
                                class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 foucus:border-orange-400 sm:text-sm sm:leading-6"
                                placeholder="Password"
                            />
                        </div>
                    </div>

                    <div class="flex w-full items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember-me"
                                name="remember-me"
                                type="checkbox"
                                class="relative h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                            />

                            <label
                                for="remember-me"
                                class="ml-2 block text-sm text-gray-900"
                                >Remember me</label
                            >
                        </div>

                        <div class="text-sm">
                            <a
                                href="#"
                                class="font-medium text-gray-500 hover:text-orange-600"
                                >Forgot your password?</a
                            >
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="group relative flex w-full justify-center rounded-md bg-orange-600 px-3 py-2.5 text-md font-semibold text-white hover:text-orange-600 hover:bg-white hover:border hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                        >
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3"
                            >
                                <LockClosedIcon
                                    class="h-5 w-5 text-white group-hover:text-indigo-400"
                                    aria-hidden="true"
                                />
                            </span>
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { LockClosedIcon } from "@heroicons/vue/20/solid";
</script>

<style scoped></style>
