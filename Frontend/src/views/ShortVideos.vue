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
            @click="init"
            class="flex justify-center rounded-full bg-white shadow-md px-4 py-2 text-md font-semibold text-orange-600 ring-1 ring-white hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Start
          </button>
          <button
            @click="startRecording"
            id="record"
            disabled
            class="flex justify-center rounded-full bg-orange-600 shadow-md px-4 py-2 text-md font-semibold text-white ring-1 ring-white hover:bg-white hover:text-orange-600 disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Record
          </button>
          <button
            id="playButton"
            @click="play"
            disabled
            class="flex justify-center rounded-full bg-white shadow-md px-4 py-2 text-md font-semibold disabled:text-white text-black ring-1 disabled:ring-white ring-black hover:bg-black hover:text-orange-600 disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Play
          </button>
          <button
            id="pause"
            disabled
            class="flex justify-center rounded-full bg-gray-900 shadow-md px-4 py-2 text-md font-semibold text-white hover:text-orange-600 ring-1 ring-white disabled:bg-gray-100 hover:ring-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Pause
          </button>
          <button
            id="stop"
            disabled
            @click="stopRecording"
            class="flex justify-center rounded-full shadow-md bg-red-600 px-4 py-2 text-md font-semibold text-white hover:text-red-600 ring-1 ring-white disabled:bg-gray-100 hover:ring-red-600 hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            Stop
          </button>
        </div>
      </div>
      <video
        id="recorded"
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
if (navigator.mediaDevices) {
  console.log("getUserMedia supported.");

  const constraints = { audio: true };
  let chunks = [];

  navigator.mediaDevices
    .getUserMedia(constraints)
    .then((stream) => {
      const mediaRecorder = new MediaRecorder(stream);

      visualize(stream);

      record.onclick = () => {
        mediaRecorder.start();
        console.log(mediaRecorder.state);
        console.log("recorder started");
        record.style.background = "red";
        record.style.color = "black";
      };

      stop.onclick = () => {
        mediaRecorder.stop();
        console.log(mediaRecorder.state);
        console.log("recorder stopped");
        record.style.background = "";
        record.style.color = "";
      };

      mediaRecorder.onstop = (e) => {
        console.log("data available after MediaRecorder.stop() called.");

        const clipName = prompt("Enter a name for your sound clip");

        const clipContainer = document.createElement("article");
        const clipLabel = document.createElement("p");
        const audio = document.createElement("audio");
        const deleteButton = document.createElement("button");

        clipContainer.classList.add("clip");
        audio.setAttribute("controls", "");
        deleteButton.textContent = "Delete";
        clipLabel.textContent = clipName;

        clipContainer.appendChild(audio);
        clipContainer.appendChild(clipLabel);
        clipContainer.appendChild(deleteButton);
        soundClips.appendChild(clipContainer);

        audio.controls = true;
        const blob = new Blob(chunks, { type: "audio/ogg; codecs=opus" });
        chunks = [];
        const audioURL = URL.createObjectURL(blob);
        audio.src = audioURL;
        console.log("recorder stopped");

        deleteButton.onclick = (e) => {
          const evtTgt = e.target;
          evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
        };
      };

      mediaRecorder.ondataavailable = (e) => {
        chunks.push(e.data);
      };
    })
    .catch((err) => {
      console.error(`The following error occurred: ${err}`);
    });
}

export default {
  components: {
    MainLayout,
    NavBar,
  },
  name: "recordvideos",
  data() {
    return {
      mediaRecorder: "",
      recordedBlobs: [],
      localStream: "",
      theRecorder: "",
      recordedChunks: [],
    };
  },

  mounted() {
    // this.init();
  },
};
</script>

<style></style>
