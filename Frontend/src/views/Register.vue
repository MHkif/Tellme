<template>
  <div class="flex min-h-full items-center">
    <div class="relative hidden w-[40%] h-screen md:flex">
      <div
        class="absolute -top-40 -left-32 rounded-full border border-orange-600 bg-orange-50"
        style="height: 650px; width: 650px"
      ></div>

      <div
        class="absolute -top-40 -left-32 rounded-full border border-orange-600 bg-gray-900"
        style="height: 620px; width: 620px"
      ></div>
    </div>

    <!-- Right Side Form -->
    <div
      class="z-20 w-full flex flex-col h-screen space-y-8 py-4 px-8 md:w-[60%]"
    >
      <div class="flex items-center justify-end gap-4 w-full">
        <h3 class="block text-md text-gray-600">Already have an account ?</h3>
        <router-link
          to="/login"
          class="flex justify-center rounded-md bg-orange-600 px-4 py-2 text-md font-semibold text-white hover:text-orange-600 hover:bg-white hover:border hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          Login
        </router-link>
      </div>

      <div class="flex flex-col items-center justify-center h-full space-y-8">
        <form class="space-y-10 w-1/2" @submit.prevent="register">
          <div class="space-y-4">
            <div class="flex flex-col gap-4 md:flex-row">
              <div class="space-y-2">
                <label for="first_name" class="pl-2 font-medium"
                  >Fisrt name</label
                >
                <input
                  id="first_name"
                  name="first_name"
                  v-model="credentials.first_name"
                  type="text"
                  autocomplete="name"
                  class="relative block w-full rounded border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"
                  placeholder="Fisrt name"
                />
              </div>
              <div class="space-y-2">
                <label for="last_name" class="pl-2 font-medium"
                  >Last name</label
                >
                <input
                  id="last_name"
                  name="last_name"
                  v-model="credentials.last_name"
                  type="text"
                  autocomplete="name"
                  class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"
                  placeholder="Last name"
                />
              </div>
            </div>
            <div class="space-y-2">
              <label for="email-address" class="pl-2 font-medium">Email</label>
              <input
                id="email-address"
                name="email"
                type="email"
                v-model="credentials.email"
                autocomplete="email"
                class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"
                placeholder="Enter Your Email"
              />
            </div>
            <div class="flex flex-col gap-4 md:flex-row">
              <div class="space-y-2">
                <label for="password" class="pl-2 font-medium">Password</label>
                <input
                  id="password"
                  name="password"
                  v-model="credentials.password"
                  type="password"
                  autocomplete="current-password"
                  class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 foucus:border-orange-400 sm:text-sm sm:leading-6"
                  placeholder="Password"
                />
              </div>
              <div class="space-y-2">
                <label for="password" class="pl-2 font-medium"
                  >Confirm password</label
                >
                <input
                  id="password_confirmation"
                  name="password_confirmation"
                  v-model="credentials.password_confirmation"
                  type="password"
                  autocomplete="current-password"
                  class="relative block w-full rounded-md border border-orange-600 py-2.5 text-gray-900 ring-1 ring-outset ring-orange-600 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-orange-600 foucus:border-orange-400 sm:text-sm sm:leading-6"
                  placeholder="Confirm Password"
                />
              </div>
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="group relative flex w-full justify-center rounded-md bg-orange-600 px-3 py-2.5 text-md font-semibold text-white hover:text-orange-600 hover:bg-white hover:border hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
            >
              Sign up
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { LockClosedIcon } from "@heroicons/vue/20/solid";
import axios from "axios";

export default {
  data() {
    return {
      credentials: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      loading: true,
    };
  },
  methods: {
    register() {
      axios
        .post("http://127.0.0.1:8000/api/v1/register", this.credentials)
        .then((response) => {
          //   localStorage.setItem("token", response.data.token);
          this.$store.commit("setToken", response.data.token);
          console.log("Token : ", response.data.token);
          this.$router.push("/");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  mounted() {
    if (this.$store.state.token !== "") {
      axios
        .post("http://127.0.0.1:8000/api/v1/checkToken", {
          token: this.$store.state.token,
        })
        .then((res) => {
          this.loading = false;
          this.$router.push("/");
        })
        .catch((err) => {
          this.loading = false;
          this.$store.commit("clearToken");
        });
    } else {
      this.loading = false;
    }
  },
};
</script>

<style scoped></style>
