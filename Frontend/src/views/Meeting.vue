<template>
  <MainLayout>
    <div
      class="flex w-full h-[4rem] p-8 justify-between items-center"
      style="background-color: #252525"
    >
      <h3 class="font-bold text-2xl text-white">Meeting</h3>
      <button
        @click="joinStreamInit"
        class="flex justify-center rounded bg-gray-900 px-4 py-2 text-md font-semibold text-orange-600 border border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
      >
        Launch a Meet
      </button>
    </div>

    <!-- Main -->
    <div
      v-if="calling"
      class="w-full h-[calc(100vh-4rem)] flex"
      style="background-color: #252525"
    >
      <!-- Video Chat -->
      <section
        id="stream"
        class="h-full w-full md:w-[73%] rounded-lg bg-gray-800 p-2"
      >
        <div class="relative h-full w-full rounded-lg overflow-hidden">
          <div
            id="room"
            class="h-[92%] w-full flex flex-col gap-2 rounded-lg py-2"
          >
            <div
              @click="hideDisplayFrame"
              id="stream_box"
              class="h-[calc(100%-150px)] w-full bg-white rounded-md overflow-hidden"
              style="display: none"
            ></div>
            <div
              id="users_snap"
              class="snap-start snap-x flex gap-2 snap-mandatory overflow-x-auto h-[150px]"
            >
              <!-- <div
                @click="expandVideoFrame($event)"
                id="user-container-2"
                class="test snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 overflow-hidden md:flex-row overflow-hidden"
              >
                <div
                  id="user-2"
                  class="w-full h-full bg-gray-800 flex items-center justify-center text-white"
                >
                  2
                </div>
              </div> -->
            </div>
          </div>
          <div
            id="stream_actions"
            class="w-full absolute bottom-1 flex items-center justify-center gap-4"
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
              id="call-btn"
              @click="leaveStream"
              class="p-1.5 bg-red-600 text-white rounded shadow-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 3.75L18 6m0 0l2.25 2.25M18 6l2.25-2.25M18 6l-2.25 2.25m1.5 13.5c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z"
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
      <div class="hidden w-[27%] h-full flex flex-col md:flex">
        <div
          class="w-full flex items-center justify-center p-4 border-b border-gray-700"
        >
          <p
            class="px-8 p-2 flex items-center justify-center gap-4 rounded text-white border border-orange-600"
          >
            Participants
            <span class="px-2 bg-orange-600 txet-white rounded">0</span>
          </p>
        </div>

        <div class="p-4">
          <input
            placeholder="Search"
            type="text"
            name="search"
            class="hidden block w-full px-3 py-1.5 text-gray-600 placeholder-gray-400 bg-white border border-orange-300 rounded-md focus:border-orange-400 focus:outline-none focus:ring focus:ring-orange-300 focus:ring-opacity-40 md:block"
          />
        </div>
      </div>
      <!-- End Participants -->
    </div>
    <div
      v-else
      class="w-full h-[calc(100vh-4rem)] flex"
      style="background-color: #252525"
    >
      <div class="hidden h-[50%] md:block">
        <img src="../assets/Group_video.svg" alt="" class="h-full" />
      </div>
    </div>
    <!-- End Main -->
  </MainLayout>
</template>

<script>
import "../js/AgoraRTC_N-4.17.0.js";
// import "../js/room_rtc.js";
import "../js/room.js";
import axios from "axios";
import Swal from "sweetalert2";
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";
import { shallowRef } from "vue";

export default {
  components: {
    MainLayout,
    NavBar,
  },
  data() {
    return {
      APP_ID: "6b1a5dd316ca49559aba4c4cd2815d89",
      uid: "",
      token: "",
      calling: true,
      client: shallowRef(),
      userIdInDisplayFrame: "",
      localTracks: [],
      remoteUsers: {},
      localScreenTraks: "",
      sharingScreen: false,
    };
  },
  methods: {
    async joinStreamInit() {
      this.client = AgoraRTC.createClient({
        mode: "rtc",
        codec: "vp8",
      });
      await this.client.join(this.APP_ID, "main", null, this.uid);

      this.client.on("user-published", this.handeleUserPublished);
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
      let member = `<div
      id="user-container-${this.uid}"
        class="member_container snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
      >
        <div id="user-${this.uid}" class="w-full h-full bg-blue-50"></div>
      </div>`;
      document
        .getElementById("users_snap")
        .insertAdjacentHTML("beforeend", member);
      this.localTracks[1].play(`user-${this.uid}`);
      document
        .getElementById(`user-container-${this.uid}`)
        .addEventListener("click", this.expandVideoFrame);

      // let streamer = `<div id="stream_box-${this.uid}" class="h-[calc(100%-50px)] w-full bg-white rounded-md overflow-hidden">
      //                   <div class ="h-full w-full" id="streamer-${this.uid}">
      //                   </div>
      //               </div>
      // `;
      // document
      //   .getElementById("room")
      //   .insertAdjacentHTML("beforebegin", streamer);
      // this.localTracks[1].play(`streamer-${this.uid}`);

      await this.client.publish([this.localTracks[0], this.localTracks[1]]);
    },

    async handeleUserPublished(user, mediaType) {
      console.log("New User");
      this.remoteUsers[user.uid] = user;
      await this.client.subscribe(user, mediaType);

      let member = document.getElementById(`user-container-${user.uid}`);

      if (member === null) {
        member = `<div
         id="user-container-${user.uid}"
                class=" snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
                >
                <div id="user-${user.uid}" class="w-full h-full bg-blue-50"></div>
                </div>`;
        document
          .getElementById("users_snap")
          .insertAdjacentHTML("beforeend", member);
      }
      document
        .getElementById(`user-container-${user.uid}`)
        .addEventListener("click", this.expandVideoFrame);

      if (mediaType === "video") {
        user.videoTrack.play(`user-${user.uid}`);
      }

      if (mediaType === "audio") {
        user.audioTrack.play();
      }
    },

    async handleUserLeft(user) {
      let displayFrame = document.getElementById("stream_box");
      delete this.remoteUsers[user.uid];
      document.getElementById(`user-container-${user.uid}`).remove();
      if (this.userIdInDisplayFrame === `user-container-${user.uid}`) {
        displayFrame.style.display = "none";
      }
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
        displayFrame.style.display = "block";
        let member = `<div
                        @click="expandVideoFrame($event)"
                        id="user-container-${this.uid}"
                          class="member_container snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
                        >
                          <div id="user-${this.uid}" class="w-full h-full bg-blue-50"></div>
                        </div>`;
        displayFrame.insertAdjacentHTML("beforeend", member);
        this.userIdInDisplayFrame = `user-container-${this.uid}`;
        this.localScreenTraks.play(`user-${this.uid}`);
      } else {
        this.sharingScreen = false;
        camera.classList.replace("hidden", "block");
        screen.classList.replace("bg-gray-900", "bg-gray-600");
        screen.classList.replace("border-orange-600", "border-gray-600");
        screen.classList.replace("text-orange-600", "text-white");
        camera.classList.replace("bg-gray-600", "bg-gray-900");
        camera.classList.replace("border-gray-600", "border-orange-600");
        camera.classList.replace("text-white", "text-orange-600");
      }
    },

    expandVideoFrame(e) {
      let displayFrame = document.getElementById("stream_box");

      let child = displayFrame.children[0];
      if (child) {
        document.getElementById("users_snap").appendChild(child);
      }
      displayFrame.style.display = "block";
      displayFrame.appendChild(e.currentTarget);
      this.userIdInDisplayFrame = e.currentTarget.id;
    },

    hideDisplayFrame() {
      let displayFrame = document.getElementById("stream_box");
      this.userIdInDisplayFrame = null;
      displayFrame.style.display = "none";

      let child = displayFrame.children[0];
      document.getElementById("users_snap").appendChild(child);
    },
  },
  mounted() {
    // this.joinStreamInit();
    if (this.$store.state.token !== "") {
      // this.uid = this.$store.state.token;
      this.uid = String(Math.floor(Math.random() * 10000));
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
