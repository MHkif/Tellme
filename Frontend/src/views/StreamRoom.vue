<template>
  <MainLayout>
    <div
      class="flex w-full h-[4rem] p-8 justify-between items-center"
      style="background-color: #252525"
    >
      <h3
        class="bg-clip-text text-transparent bg-gradient-to-r from-orange-600 to-gray-600 font-bold text-2xl"
      >
        Streaming
      </h3>

      <button
        @click="joinStreamInit"
        class="flex justify-center rounded bg-gray-900 px-4 py-2 text-md font-semibold text-orange-600 border border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
      >
        Launch a Stream
      </button>
    </div>

    <!-- Main -->

    <div
      v-if="launching"
      class="w-full h-[calc(100vh-4rem)] flex"
      style="background-color: #252525"
    >
      <!-- Video Chat -->
      <section id="stream" class="h-full w-full rounded">
        <div class="relative h-full w-full rounded-lg overflow-hidden">
          <div
            id="room"
            class="h-[88%] w-full flex flex-col gap-2 rounded-t-lg pb-2 overflow-hidden"
          >
            <div
              id="stream_box"
              class="h-full w-full flex items-center justify-center bg-black rounded-md overflow-hidden"
            >
              <svg
                v-show="!launching"
                class="animate-spin h-12 w-12 text-orange-600"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <circle
                  class="opacity-25"
                  cx="12"
                  cy="12"
                  r="10"
                  stroke="currentColor"
                  stroke-width="4"
                ></circle>
                <path
                  class="opacity-75"
                  fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
              </svg>
            </div>
          </div>
          <div
            id="stream_actions"
            class="w-full absolute bottom-4 flex items-center justify-center gap-4"
          >
            <button
              id="volume-btn"
              class="p-1.5 bg-gray-600 text-white rounded shadow-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"
                />
              </svg>
            </button>

            <button
              id="mic-btn"
              @click="toggleMic"
              class="p-1.5 bg-gray-900 text-orange-600 border border-orange-600 rounded shadow-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"
                />
              </svg>
            </button>

            <button
              @click="toggleCamera"
              id="camera-btn"
              class="block p-1.5 bg-gray-900 text-orange-600 border border-orange-600 rounded shadow-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M12 18.75H4.5a2.25 2.25 0 01-2.25-2.25V9m12.841 9.091L16.5 19.5m-1.409-1.409c.407-.407.659-.97.659-1.591v-9a2.25 2.25 0 00-2.25-2.25h-9c-.621 0-1.184.252-1.591.659m12.182 12.182L2.909 5.909M1.5 4.5l1.409 1.409"
                />
              </svg>
            </button>

            <button
              @click="toggleScreen"
              id="screen-btn"
              class="p-1.5 bg-gray-600 text-white border border-gray-600 rounded shadow-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                />
              </svg>
            </button>
          </div>
        </div>
      </section>
      <!-- End Video Chat -->

      <!-- Participants -->
      <div
        class="pt-4 w-[3.35rem] h-full flex flex-col md:w-[27%] md:flex overflow-hidden"
      >
        <div
          class="w-full flex flex-col items-center justify-center gap-4 p-4 border-b border-gray-700 md:flex-row"
        >
          <p
            class="p-1 flex items-center justify-center md:gap-4 rounded text-white border border-orange-600 md:py-2 md:px-8"
          >
            <span class="hidden md:block">Viewers</span>
            <span class="px-2 md:bg-orange-600 text-white rounded">0</span>
          </p>
        </div>

        <div class="p-2 md:p-4">
          <!-- search -->
        </div>
      </div>
      <!-- End Participants -->
    </div>
    <div
      v-else
      class="w-full h-[calc(100vh-4rem)] flex flex-col justify-center items-center gap-10"
      style="background-color: #252525"
    >
      <div class="flex flex-col items-center">
        <p
          class="leading-8 text-2xl text-white leading-relaxed font-medium md:text-4xl"
        >
          Make The Universe Closer
        </p>
        <p
          class="leading-8 text-2xl text-white leading-relaxed font-medium md:text-4xl"
        >
          with
          <span class="text-orange-600" style="color: #ff4d00">Tellme</span>
        </p>
      </div>
      <div class="h-[55%]">
        <img src="../assets/streaming.svg" alt="" class="h-full" />
      </div>
    </div>
  </MainLayout>
</template>

<script>
import "../js/AgoraRTC_N-4.17.0.js";
import "../js/room.js";
import axios from "axios";
import MainLayout from "../components/MainLayout.vue";
import { ref, shallowRef } from "vue";
import DropdownUsers from "../components/DropdownUsers.vue";

export default {
  components: {
    MainLayout,
    DropdownUsers,
  },
  data() {
    return {
      APP_ID: "6b1a5dd316ca49559aba4c4cd2815d89",
      uid: "",
      token: "",
      launching: true,
      client: shallowRef(),
      userIdInDisplayFrame: "",
      localTracks: [],
      remoteUsers: {},
      localScreenTraks: "",
      sharingScreen: false,
      modelOpen: false,
    };
  },

  methods: {
    async joinStreamInit() {
      this.launching = true;
      this.client = AgoraRTC.createClient({
        mode: "rtc",
        codec: "vp8",
      });
      await this.client.join(this.APP_ID, "1", null, this.uid);

      //   this.client.on("user-published", this.handeleUserPublished);
      this.client.on("user-left", this.handleUserLeft);

      this.joinStream();
    },

    async leaveStream() {
      await this.client.leave();
    },

    async joinStream() {
      this.localTracks = await AgoraRTC.createMicrophoneAndCameraTracks(
        {},
        {
          encoderConfig: {
            width: { min: 640, ideal: 1920, max: 1920 },
            height: { min: 480, ideal: 1080, max: 1080 },
          },
        }
      );

      //   let streamer = `<div class ="h-full w-full" id="streamer-${this.uid}">
      //                     </div>

      //   `;
      //   document.getElementById("stream_box").style.display = "block";
      //   document
      //     .getElementById("stream_box")
      //     .insertAdjacentHTML("beforebegin", streamer);
      this.localTracks[1].play(`stream_box`);

      await this.client.publish([this.localTracks[0], this.localTracks[1]]);
    },

    async handleUserLeft() {
    //   let displayFrame = document.getElementById("stream_box");
    //   displayFrame.style.display = "none";
      alert('User Has been Left')
    },

    async toggleCamera(e) {
      let button = document.getElementById("camera-btn");

      if (this.localTracks[1].muted) {
        await this.localTracks[1].setMuted(false);
        button.classList.replace("bg-gray-600", "bg-gray-900");
        button.classList.replace("border-gray-600", "border-orange-600");
        button.classList.replace("text-white", "text-orange-600");
      } else {
        await this.localTracks[1].setMuted(true);
        button.classList.replace("bg-gray-900", "bg-gray-600");
        button.classList.replace("border-orange-600", "border-gray-600");
        button.classList.replace("text-orange-600", "text-white");
      }
    },

    async toggleMic(e) {
      let mic = document.getElementById("mic-btn");

      if (this.localTracks[0].muted) {
        await this.localTracks[0].setMuted(false);
        mic.classList.replace("bg-gray-600", "bg-gray-900");
        mic.classList.replace("border-gray-600", "border-orange-600");
        mic.classList.replace("text-white", "text-orange-600");
      } else {
        await this.localTracks[0].setMuted(true);
        mic.classList.replace("bg-gray-900", "bg-gray-600");
        mic.classList.replace("border-orange-600", "border-gray-600");
        mic.classList.replace("text-orange-600", "text-white");
      }
    },

    async toggleScreen(e) {
      let screen = document.getElementById("screen-btn");
      let camera = document.getElementById("camera-btn");
      let displayFrame = document.getElementById("stream_box");

      if (!this.sharingScreen) {
        this.sharingScreen = true;
        screen.classList.replace("bg-gray-600", "bg-gray-900");
        screen.classList.replace("border-gray-600", "border-orange-600");
        screen.classList.replace("text-white", "text-orange-600");
        camera.classList.replace("bg-gray-900", "bg-gray-600");
        camera.classList.replace("border-orange-600", "border-gray-600");
        camera.classList.replace("text-orange-600", "text-white");
        camera.classList.replace("block", "hidden");

        this.localScreenTraks = await AgoraRTC.createScreenVideoTrack();
        // document.getElementById(`user-container-${this.uid}`).remove();
        displayFrame.innerHTML = null;

        this.localScreenTraks.play(`stream_box`);
      } else {
        this.sharingScreen = false;
        camera.classList.replace("hidden", "block");
        screen.classList.replace("bg-gray-900", "bg-gray-600");
        screen.classList.replace("border-orange-600", "border-gray-600");
        screen.classList.replace("text-orange-600", "text-white");
        camera.classList.replace("bg-gray-600", "bg-gray-900");
        camera.classList.replace("border-gray-600", "border-orange-600");
        camera.classList.replace("text-white", "text-orange-600");
        displayFrame.innerHTML = null;
        this.localTracks[1].play(`stream_box`);
      }
    },
  },
  mounted() {
    this.joinStreamInit();
    if (this.$store.state.token !== "" && this.$store.state.uid !== "") {
      this.uid = this.$store.state.uid;
      // this.uid = String(Math.floor(Math.random() * 10000));
      axios
        .post("http://127.0.0.1:8000/api/v1/checkToken", {
          token: this.$store.state.token,
        })
        .then((res) => {
          if (res.data.status == "Expired") {
            // this.$store.commit("setToken", res.data.token);
            Swal.fire({
              title: "Your session has expired",
              text: "Please log in again to continue using the app .",
              confirmButtonText: "Login",
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                this.$router.push("/login");
              } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
              }
            });
          }
          this.loading = false;
        })
        .catch((err) => {
          this.loading = false;
          this.$router.push("/login");
        });
    } else {
      this.loading = false;
      this.$router.push("/login");
    }
  },
};
</script>

<style>
/* width */
::-webkit-scrollbar {
  width: 2px;
  height: 2px;
}

/* Track */
::-webkit-scrollbar-track {
  /* box-shadow: inset 0 0 5px grey; */
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ff4d003e;
  border-radius: 16px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #ff4d0079;
}
</style>
