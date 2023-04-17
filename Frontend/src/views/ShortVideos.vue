<template>
  <MainLayout>
    <!-- Navbar -->
    <NavBar />
    <!-- End Navbar -->

    <div
      class="flex flex-col gap-6 w-full h-[calc(100vh-5rem)] items-center justify-center px-8 md:px-12"
    >
      <div class="h-[80%] w-[100%]">
        <video
          id="video"
          class="h-full object-cover bg-center w-full bg-gray-900 ring-2 ring-gray-100 rounded-lg shadow-lg"
          autoplay
          playsinline
        ></video>
      </div>
      <div class="flex items-center justify-center gap-6">
        <button
          id="record"
          @click="recordFunction"
          :class="
            !isRecording
              ? 'bg-red-600 ring-2 ring-white'
              : 'ring-2 ring-red-600'
          "
          class="flex items-center justify-center w-16 h-16 rounded-full shadow-md text-md font-semibold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            :class="recorded ? 'block' : 'hidden'"
            class="w-10 h-10 fill-white"
          >
            <path
              d="M12 16c1.671 0 3-1.331 3-3s-1.329-3-3-3-3 1.331-3 3 1.329 3 3 3z"
            ></path>
            <path
              d="M20.817 11.186a8.94 8.94 0 0 0-1.355-3.219 9.053 9.053 0 0 0-2.43-2.43 8.95 8.95 0 0 0-3.219-1.355 9.028 9.028 0 0 0-1.838-.18V2L8 5l3.975 3V6.002c.484-.002.968.044 1.435.14a6.961 6.961 0 0 1 2.502 1.053 7.005 7.005 0 0 1 1.892 1.892A6.967 6.967 0 0 1 19 13a7.032 7.032 0 0 1-.55 2.725 7.11 7.11 0 0 1-.644 1.188 7.2 7.2 0 0 1-.858 1.039 7.028 7.028 0 0 1-3.536 1.907 7.13 7.13 0 0 1-2.822 0 6.961 6.961 0 0 1-2.503-1.054 7.002 7.002 0 0 1-1.89-1.89A6.996 6.996 0 0 1 5 13H3a9.02 9.02 0 0 0 1.539 5.034 9.096 9.096 0 0 0 2.428 2.428A8.95 8.95 0 0 0 12 22a9.09 9.09 0 0 0 1.814-.183 9.014 9.014 0 0 0 3.218-1.355 8.886 8.886 0 0 0 1.331-1.099 9.228 9.228 0 0 0 1.1-1.332A8.952 8.952 0 0 0 21 13a9.09 9.09 0 0 0-.183-1.814z"
            ></path>
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            :class="isRecording ? 'block' : 'hidden'"
            class="w-10 h-10 fill-black"
          >
            <path
              d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
            ></path>
            <path d="M13 9h2v6h-2zM9 9h2v6H9z"></path>
          </svg>
        </button>

        <button
          :class="recorded ? 'block' : 'hidden'"
          id="playButton"
          @click="play"
          class="flex items-center justify-center w-16 h-16 rounded-full shadow-md text-md font-semibold ring-1 ring-red-600 hover:ring-orange-600 bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="w-10 h-10 fill-white"
          >
            <path
              d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
            ></path>
            <path d="m9 17 8-5-8-5z"></path>
          </svg>
        </button>

        <a
          href="#"
          id="download"
          @click="save"
          :class="recorded ? 'block' : 'hidden'"
          class="flex items-center justify-center w-16 h-16 rounded-full shadow-md text-md font-semibold ring-1 ring-red-600 hover:ring-orange-600 bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="w-10 h-10 fill-black"
          >
            <path
              d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.61 5.757 9.149 3.609 9.792 2 11.82 2 14c0 2.657 2.089 4.815 4.708 4.971V19H17.99v-.003L18 19c2.206 0 4-1.794 4-4a4.008 4.008 0 0 0-3.056-3.888zM8 12h3V9h2v3h3l-4 5-4-5z"
            ></path>
          </svg>
        </a>

        <!-- <button
        
          @click="play"
          disabled
          class="flex justify-center rounded-full bg-white shadow-md px-4 py-2 text-md font-semibold disabled:text-white text-black ring-1 disabled:ring-white ring-black hover:bg-black hover:text-orange-600 disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          Play
        </button> -->

        <!-- <a
          href="#"
          id="download"
          @click="save"
          class="flex justify-center rounded-full shadow-md bg-red-600 px-4 py-2 text-md font-semibold text-white hover:text-red-600 ring-1 ring-white disabled:bg-gray-100 hover:ring-red-600 hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
        >
          Downlaod
        </a> -->
      </div>
    </div>
  </MainLayout>
</template>

<script>
import NavBar from "../components/NavBar.vue";
import MainLayout from "../components/MainLayout.vue";

export default {
  components: {
    MainLayout,
    NavBar,
  },
  name: "shv",
  data() {
    return {
      mediaRecorder: "",
      theRecorder: "",
      recordedChunks: [],
      isRecording: false,
      recorded: false,
    };
  },

  methods: {
    async init() {
      (this.recorded = false),
        (this.isRecordeing = true),
        (document.querySelector("video").innerHTML = null);

      await navigator.mediaDevices
        .getUserMedia({
          video: {
            encoderConfig: {
              width: { min: 640, ideal: 1920, max: 1920 },
              height: { min: 480, ideal: 1080, max: 1080 },
            },
          },
          audio: {},
        })
        .then(this.accessMedia)
        .catch((e) => {
          console.error("getUserMedia() failed: " + e);
        });
      // document.getElementById("video").srcObject = this.localStream;
    },
    accessMedia(stream) {
      this.mediaRecorder = stream;
      var video = document.querySelector("video");
      video.srcObject = stream;
      var recorder = new MediaRecorder(stream, {
        mimeType: "video/webm",
      });
      this.theRecorder = recorder;
      recorder.ondataavailable = (e) => {
        this.recordedChunks.push(e.data);
      };
      recorder.start(100);
      this.recorded = false;
      document.getElementById("playCotroller").disabled = false;
    },

    recordFunction() {
      if (!this.isRecording) {
        this.isRecording = true;
        this.init();
      } else if (this.theRecorder) {
        this.isRecording = false;
        this.stopRecording();
      } else {
        alert("Somthing wrong");
      }
    },

    // startRecording() {
    //   this.recordedChunks = [];
    //   this.mediaRecorder.start();
    //   document.getElementById("playCotroller").disabled = false;

    //   console.log("Recording is Started :", this.mediaRecorder);
    // },

    stopRecording() {
      this.theRecorder.stop();
      this.mediaRecorder.getTracks().forEach((track) => track.stop());
      console.log("Recording is Stopped :", this.theRecorder);
      console.log("Recording is :", this.mediaRecorder.state);
      var video = (document.querySelector("video").innerHTML = null);
      var recordedVideo = document.getElementById("video");
      document.getElementById("playButton").disabled = false;
      const videoBlob = new Blob(this.recordedChunks, {
        type: "video/webm",
      });
      const videoUrl = URL.createObjectURL(videoBlob);
      recordedVideo.src = null;
      recordedVideo.srcObject = null;
      console.log("test ", videoUrl);
      recordedVideo.src = videoUrl;
      recordedVideo.controls = true;
      this.recorded = true;
    },
    save() {
      var recordedVideo = document.getElementById("video");

      var downloadAnchor = document.getElementById("download");
      downloadAnchor.href = recordedVideo.src;
      downloadAnchor.download = "test.webm";
    },

    play() {
      var recordedVideo = document.querySelector("video");

      // let recordedVideo = document.getElementById("recorded");
      const supperBuffer = new Blob(this.recordedChunks, {
        type: "video/webm",
      });
      recordedVideo.src = null;
      recordedVideo.srcObject = null;

      recordedVideo.src = window.createObjectURL(supperBuffer);
      recordedVideo.play();
    },

    pause() {
      this.theRecorder.stop();
    },
    playVideo() {
      this.theRecorder.play();
    },

    playFunction() {
      var toggle = document.getElementById("playCotroller");
      if (toggle.innerText === "Pause") {
        toggle.innerText = "Play";
        this.pause();
      } else if (toggle.innerText === "Play") {
        toggle.innerText = "Pause";
        this.playVideo();
      } else {
        alert("Somthing wrong");
      }
    },
  },

  mounted() {
    // this.init();
  },
};
</script>

<style scoped>
/* #video {
  width: 100%;
} */
</style>
