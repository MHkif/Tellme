<template>
  <footer
    :class="this.$store.state.play ? '' : 'hidden'"
    id="footer"
    class="col-span-6 p-4 grid grid-cols-3 place-items-center gap-6 fixed z-10 w-[calc(100%-3.35rem)] bottom-0"
    style="background-color: #252525"
  >
    <div class="flex items-center">
      <div class="overflow-hidden rounded-xl mr-4">
        <img
          id="footerImg"
          class="h-14 w-14 flex-shrink-0"
          :src="podcast.cover"
          alt=""
        />
      </div>
      <div class="mr-4 space-y-2">
        <div
          id="footerTitle"
          class="text-sm text-gray-400 text-line-clamp-1 font-semibold"
        >
          {{ podcast.title }}
        </div>
      </div>
      <div class="flex items-center">
        <button class="text-white p-2">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
            <path
              d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"
            />
          </svg>
        </button>
      </div>
    </div>
    <div>
      <div class="flex items-center justify-center mb-3">
        <audio
          ref="audioPlayer"
          controls
          id="audio"
          preload="metadata"
          :src="podcast.url"
          hidden
        ></audio>
        <button
          :disabled="!podcasts.length"
          class="w-5 h-5 text-white mr-6 disabled:text-gray-600"
        >
          <svg
            class="fill-current w-3"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M6.59 12.83L4.4 15c-.58.58-1.59 1-2.4 1H0v-2h2c.29 0 .8-.2 1-.41l2.17-2.18 1.42 1.42zM16 4V1l4 4-4 4V6h-2c-.29 0-.8.2-1 .41l-2.17 2.18L9.4 7.17 11.6 5c.58-.58 1.59-1 2.41-1h2zm0 10v-3l4 4-4 4v-3h-2c-.82 0-1.83-.42-2.41-1l-8.6-8.59C2.8 6.21 2.3 6 2 6H0V4h2c.82 0 1.83.42 2.41 1l8.6 8.59c.2.2.7.41.99.41h2z"
            />
          </svg>
        </button>

        <button
          :disabled="!podcasts.length"
          id="previous"
          class="w-5 h-5 text-white mr-6 disabled:text-gray-600"
        >
          <svg
            class="fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path d="M4 5h3v10H4V5zm12 0v10l-9-5 9-5z" />
          </svg>
        </button>

        <button
          v-if="isPlaying"
          id="pause"
          @click="pause"
          :disabled="!podcasts.length && !podcast"
          class="rounded-full flex text-white disabled:text-gray-600 mr-6"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="fill-current w-8 h-8 m-auto"
          >
            <path
              d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
            ></path>
            <path d="M13 9h2v6h-2zM9 9h2v6H9z"></path>
          </svg>
        </button>
        <button
          v-else
          id="play"
          @click="play(this.podcast)"
          :disabled="!podcasts.length && !podcast"
          class="rounded-full flex text-white disabled:text-gray-600 mr-6"
        >
          <svg
            class="fill-current h-8 w-8 m-auto"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z"
              fill="currentColor"
            />
            <path d="M16 12L10 16.3301V7.66987L16 12Z" fill="currentColor" />
          </svg>
        </button>

        <button
          :disabled="!podcasts.length"
          id="next"
          class="w-5 h-5 text-white disabled:text-gray-600 mr-6"
        >
          <svg
            class="fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path d="M13 5h3v10h-3V5zM4 5l9 5-9 5V5z" />
          </svg>
        </button>
        <button
          :disabled="!podcasts.length && !podcast"
          class="w-5 h-5 text-white disabled:text-gray-600"
        >
          <svg
            class="fill-current w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M10 3v2a5 5 0 0 0-3.54 8.54l-1.41 1.41A7 7 0 0 1 10 3zm4.95 2.05A7 7 0 0 1 10 17v-2a5 5 0 0 0 3.54-8.54l1.41-1.41zM10 20l-4-4 4-4v8zm0-12V0l4 4-4 4z"
            />
          </svg>
        </button>
      </div>

      <div class="flex items-center">
        <span class="text-xs text-white font-light">{{ duration }}</span>
        <input
          type="range"
          min="0"
          max="100"
          value="0"
          ref="progressBar"
          id="progressBar"
          class="w-full h-0.5 bg-gray-400 rounded-lg appearance-none cursor-pointer"
        />
        <span class="text-xs text-black font-light"> {{ endDuration }}</span>
      </div>
    </div>
    <div class="flex flex-1 items-center justify-end space-x-1">
      <i class="fa-solid fa-volume-xmark cursor-pointer" id="mute"></i>
      <input
        type="range"
        min="0"
        max="100"
        value="2.5"
        step="0.5"
        id="volumInp"
        class="h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer"
      />
      <i class="fa-solid fa-volume-high cursor-pointer" id="unmute"></i>

      <svg
        @click="close"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        class="fill-white cursor-pointer"
      >
        <path
          d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V7h16l.001 12H4z"
        ></path>
        <path
          d="m15.707 10.707-1.414-1.414L12 11.586 9.707 9.293l-1.414 1.414L10.586 13l-2.293 2.293 1.414 1.414L12 14.414l2.293 2.293 1.414-1.414L13.414 13z"
        ></path>
      </svg>
    </div>
  </footer>
</template>

<script>
import { ref } from "vue";

export default {
  name: "AudioPlayer",
  props: ["podcast"],
  
  data() {
    return {
      current: {},
      currentTime: "",
      duration: 0,
      endDuration: 0,
      index: 0,
      podcasts: [],
      player: new Audio(),
      isPlaying: false,
    };
  },
  methods: {
    close() {
      this.$store.commit("clearPlay");
    },
    play(podcast) {
      if (typeof podcast.url != "undefined" || podcast.url != null) {
        const progressBar = this.$refs.progressBar;
        let volumInp = document.getElementById("volumInp");
        let audio = document.getElementById("audio");

        this.current = podcast;
        // this.player.src = this.current.url;
        audio.src = this.current.url;
        audio.play();
        // this.player.play();
        // this.player.volume = volumInp.value / 100;
        audio.volume = volumInp.value / 100;

        this.isPlaying = true;
        this.duration = audio.duration;

        let second = `${parseInt(`${this.duration % 60}`, 10)}`.padStart(
          2,
          "0"
        );
        let minute = parseInt(`${(this.duration / 60) % 60}`, 10);
        this.endDuration = `${minute}:${second}`;
        progressBar.max = this.duration;
        // get updated time by second and update the progress bar in the same time

        audio.ontimeupdate(updateProgress(this.player.currentTime));
        // update progressbar while music played
        function updateProgress(time) {
          progressBar.value = time;
          let second = `${parseInt(`${time % 60}`, 10)}`.padStart(2, "0");
          let minute = parseInt(`${(time / 60) % 60}`, 10);
          this.duration = `${minute}:${second}`;
        }
      } else {
        alert("This Audio is Null");
      }
    },
    pause() {
      this.player.pause();
      this.isPlaying = false;
    },

    prev() {
      this.index--;
      if (this.index < 0) {
        this.index = this.podcasts.length - 1;
      }

      this.current = this.podcasts[this.index];
      this.play(this.current);
    },
    next() {
      this.index++;
      if (this.index > this.podcasts.length - 1) {
        this.index = 0;
      }

      this.current = this.podcasts[this.index];
      this.play(this.current);
    },
    updateProgress() {
      const audio = this.$refs.audioPlayer;
      const progressBar = this.$refs.progressBar;

      const currentTime = audio.currentTime;
      const duration = audio.duration;

      // Calculate progress value as a fraction of duration
      const progress = currentTime / duration;
      progressBar.value = progress;
    },
  },
  // mounted() {
  //   this.podcast = this.$store.state.podcasts;
  // },
  created() {
    this.current = this.podcast;
    this.player.src = this.current.url;
    this.currentTime = this.current.currentTime;
    this.duration = this.current.duration;

    // this.player.play();
  },
};
</script>
