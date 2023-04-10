import { markRaw } from "vue";

const APP_ID = "6b1a5dd316ca49559aba4c4cd2815d89";
let uid = sessionStorage.getItem("uid");

if (!uid) {
  uid = String(Math.floor(Math.random() * 10000));
  sessionStorage.setItem("uid", uid);
}

let token = null;
let client;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
let streamId = urlParams.get("stream");

if (!streamId) {
  streamId = "main";
}

let localTracks = [];
let remoteUsers = {};

let joinStreamInit = async () => {
  client = markRaw(AgoraRTC.createClient({
    mode: "rtc",
    codec: "vp8",
  }));
  await client.join(APP_ID, streamId, token);

  await client.on("user-published", handeleUserPublished);
  await client.on("user-lef", handleUserLeft);

  await joinStream();
};

let joinStream = async () => {
  localTracks = await AgoraRTC.createMicrophoneAndCameraTracks(
    {},
    {
      encoderConfig: {
        width: { min: 640, ideal: 1920, max: 1920 },
        height: { min: 480, ideal: 1080, max: 1080 },
      },
    }
  );
    let member = `<div id="user-container-${uid}"
    class="test snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
  >
    <div id="user-${uid}" class="w-full h-full bg-blue-50"></div>
  </div>`;
  document.getElementById("users_snap").insertAdjacentHTML("beforeend", member);
  localTracks[1].play(`user-${uid}`);

  // let streamer = `<div id="stream_box-${uid}" class="h-[calc(100%-50px)] w-full bg-white rounded-md overflow-hidden">
  //                       <div class ="h-full w-full" id="streamer-${uid}">
  //                       </div>
  //                   </div>
  //     `;
  // document.getElementById("room").insertAdjacentHTML("beforebegin", streamer);
  // localTracks[1].play(`streamer-${uid}`);

  await client.publish([localTracks[0], localTracks[1]]);
};

let handeleUserPublished = async (user, mediaType) => {
  remoteUsers[user.uid] = user;
  await client.subscribe(user, mediaType);

  let member = document.getElementById(`user-container-${uid}`);

  if (member === null) {
    member = `<div  id="user-container-${uid}"
                class="test snap-start min-w-full md:min-w-[25%] flex flex-col h-full rounded-md bg-gray-800 border border-orange-200 md:flex-row overflow-hidden"
                >
                <div id="user-${user.uid}" class="w-full h-full bg-blue-50"></div>
                </div>`;
    document
      .getElementById("users_snap")
      .insertAdjacentHTML("beforeend", member);
  }

  if (mediaType === "video") {
    user.videoTrack.play(`user-${user.uid}`);
  }

  if (mediaType === "audio") {
    user.audioTrack.play();
  }
};

let handleUserLeft = async (user) => {
  delete remoteUsers[user.uid];
  document.getElementById(`user-container-${user.uid}`).remove();
};


joinStreamInit();
