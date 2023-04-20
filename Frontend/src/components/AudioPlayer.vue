<template>
  <footer
    :class="this.$store.state.play ? '' : 'hidden'"
    id="footer"
    class="col-span-6 py-4 p-12 grid sm:grid-cols-2 md:grid-cols-3 md:place-items-end items-center gap-6 fixed z-10 w-[calc(100%-3.35rem)] bottom-0"
    style="background-color: #252525"
  >
    <div @click="close" class="absolute top-2 right-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-5 h-5 md:w-6 md:h-6 text-gray-500 hover:text-red-600"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
    </div>
    <div
      @click="collapsed"
      class="absolute top-2 md:top-7 left-2 cursor-pointer"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        class="fill-white hover:fill-orange-500 h-5 h-5"
      >
        <path
          d="M16.121 6.465 14 4.344V10h5.656l-2.121-2.121 3.172-3.172-1.414-1.414zM4.707 3.293 3.293 4.707l3.172 3.172L4.344 10H10V4.344L7.879 6.465zM19.656 14H14v5.656l2.121-2.121 3.172 3.172 1.414-1.414-3.172-3.172zM6.465 16.121l-3.172 3.172 1.414 1.414 3.172-3.172L10 19.656V14H4.344z"
        ></path>
      </svg>
    </div>
    <div class="hidden gap-3 items-center rounded md:flex">
      <div class="overflow-hidden rounded">
        <img id="footerImg" class="h-12 w-14" :src="podcast.cover" alt="" />
      </div>

      <div
        id="footerTitle"
        class="text-sm text-gray-400 text-line-clamp-1 font-semibold"
      >
        {{ podcast.title }}
      </div>

      <button class="text-white p-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-5 h-5 fill-current"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"
          />
        </svg>
      </button>
    </div>

    <div class="flex flex-col gap-3">
      <div class="flex items-center justify-center">
        <audio
          ref="audioPlayer"
          controls
          id="podcastAudio"
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

        <!-- @click="pause" -->
        <button
          id="pause"
          :disabled="!podcasts.length && !podcast"
          class="hidden rounded-full flex text-white disabled:text-gray-600 mr-6"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="fill-current w-6 h-6 md:w-8 md:h-8 m-auto"
          >
            <path
              d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
            ></path>
            <path d="M13 9h2v6h-2zM9 9h2v6H9z"></path>
          </svg>
        </button>
        <!-- @click="play(this.podcast)" -->
        <!-- v-else -->
        <button
          id="play"
          :disabled="!podcasts.length && !podcast"
          class="rounded-full flex text-white disabled:text-gray-600 mr-6"
        >
          <svg
            class="fill-current w-6 h-6 md:w-8 md:h-8 m-auto"
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
        <span id="currentStart" class="text-xs text-white font-light">{{
          duration
        }}</span>
        <input
          type="range"
          min="0"
          max="100"
          value="0"
          ref="progressBar"
          id="progressBar"
          class="w-full h-0.5 bg-gray-400 rounded-lg appearance-none cursor-pointer"
        />
        <span id="currentEnd" class="text-xs text-black font-light">
          {{ endDuration }}</span
        >
      </div>
      <div
        id="footerTitle"
        class="text-xs text-gray-400 text-line-clamp-1 font-semibold text-center overflox-hidden md:hidden"
      >
        {{ podcast.title }} 
      </div>
    </div>
    <div class="hidden items-center justify-center space-x-1 md:flex">
      <div class="flex items-center justify-center">
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
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "AudioPlayer",
  props: ["podcast"],
  data() {
    return {
      current: {},
      currentTime: "",
      duration: "",
      endDuration: "",
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
    uncollapsed() {
      this.$store.commit("clearCollapsed");
    },
    collapsed() {
      this.$store.commit("collapsed");
      this.close();
    },
    play(podcast) {
      if (typeof podcast.url != "undefined" || podcast.url != null) {
        const progressBar = this.$refs.progressBar;
        let volumInp = document.getElementById("volumInp");
        this.current = podcast;
        this.player.src = this.current.url;
        // audio.play();
        this.player.play();
        this.player.volume = volumInp.value / 100;
        this.isPlaying = true;
        this.duration = this.player.duration;

        let second = `${parseInt(`${this.duration % 60}`, 10)}`.padStart(
          2,
          "0"
        );
        let minute = parseInt(`${(this.duration / 60) % 60}`, 10);
        this.endDuration = `${minute}:${second}`;
        progressBar.max = this.duration;
        // get updated time by second and update the progress bar in the same time

        this.player.ontimeupdate(updateProgress(this.player.currentTime));
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
  mounted() {
    // this.podcast = this.$store.state.podcasts;
    // this.uncollapsed();
  },
  created() {
    // this.current = this.podcast;
    // this.player.src = this.current.url;
    // this.currentTime = this.current.currentTime;
    // this.duration = this.current.duration;
    // this.player.play();
  },
};
</script>
