<template>
  <MainLayout>
    <!-- Navbar -->
    <NavBar />
    <!-- End Navbar -->
    <div
      id="videos"
      class="grid md:grid-cols-2 gap-8 w-full h-full p-8 justify-center items-center"
    >
      <div class="relative flex items-center justify-center">
        <video
          id="video"
          class="h-[80vh] w-full bg-orange-50 rounded-lg shadow-lg"
          autoplay
          playsinline
        ></video>
        <div class="absolute bottom-10 flex items-center justify-center gap-6">
          <button
            id="start"
            @click="recordFunction"
            class="flex justify-center rounded-full bg-white shadow-md px-4 py-2 text-md font-semibold text-orange-600 ring-1 ring-white hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Start
          </button>
          <!-- <button
            @click="startRecording"
            id="record"
            disabled
            class="flex justify-center rounded-full bg-orange-600 shadow-md px-4 py-2 text-md font-semibold text-white ring-1 ring-white hover:bg-white hover:text-orange-600 disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Record
          </button> -->
          <button
            id="playButton"
            @click="play"
            disabled
            class="flex justify-center rounded-full bg-white shadow-md px-4 py-2 text-md font-semibold disabled:text-white text-black ring-1 disabled:ring-white ring-black hover:bg-black hover:text-orange-600 disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Play
          </button>

          <!-- <button
            id="stop"
            disabled
            @click="stopRecording"
            class="flex justify-center rounded-full shadow-md bg-red-600 px-4 py-2 text-md font-semibold text-white hover:text-red-600 ring-1 ring-white disabled:bg-gray-100 hover:ring-red-600 hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Stop
          </button> -->
          <a
            href="#"
            id="download"
            class="flex justify-center rounded-full shadow-md bg-red-600 px-4 py-2 text-md font-semibold text-white hover:text-red-600 ring-1 ring-white disabled:bg-gray-100 hover:ring-red-600 hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Downlaod
          </a>
        </div>
      </div>
      <video
        id="recordedVideo"
        class="h-[80vh] w-[100%] bg-gray-200 rounded-lg shadow-lg"
        loop
        playsinline
      ></video>
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
      //   recordedBlobs: [],
      //   localStream: "",
      theRecorder: "",
      recordedChunks: [],
    };
  },

  methods: {
    async init() {
      await navigator.mediaDevices
        .getUserMedia({
          video: true,
          audio: {
            echoCancellation: true,
            noiseSuppression: true,
            sampleRate: 44100,
          },
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
      //   this.startRecording();
    },

    recordFunction() {
      var toggle = document.getElementById("start");
      if (toggle.innerText === "Start") {
        toggle.innerText = "Stop";
        this.init();
      } else if (toggle.innerText === "Stop") {
        toggle.innerText = "Start";
        this.stopRecording();
      } else {
        alert("Somthing wrong");
      }
    },

    startRecording() {
      this.recordedChunks = [];
      this.mediaRecorder.start();
      console.log("Recording is Started :", this.mediaRecorder);
    },

    // handleDataAvailable(event) {
    //   if (event.data.size > 0) {
    //     this.recordedChunks.push(event.data);
    //     this.mediaRecorder.stream.getTracks().forEach((track) => track.stop());
    //   }
    // },

    stopRecording() {
      this.theRecorder.stop();
      this.mediaRecorder.getTracks().forEach((track) => track.stop());
      console.log("Recording is Stopped :", this.theRecorder);
      console.log("Recording is :", this.mediaRecorder.state);

      var recordedVideo = document.getElementById("recordedVideo");
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
        var downloadAnchor = document.getElementById("download");
        downloadAnchor.href = videoUrl;
        downloadAnchor.download = 'test.webm'
        downloadAnchor.click();
    },

    play() {
      var recordedVideo = document.querySelector("recorded");

      // let recordedVideo = document.getElementById("recorded");
      const supperBuffer = new Blob(this.recordedChunks, {
        type: "video/webm",
      });
      recordedVideo.src = null;
      recordedVideo.srcObject = null;

      recordedVideo.src = window.createObjectURL(supperBuffer);
      recordedVideo.play();
    },
    
  },

  mounted() {
    // this.init();
  },
};
</script>

<style></style>
