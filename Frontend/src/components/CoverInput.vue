<template>
  <div class="w-full flex gap-4">
    <div
      @click="open"
      class="w-40 flex items-center justify-center text-sm text-gray-700 capitalize rounded bg-gray-900 px-4 py-1.5 font-meduim text-white hover:text-orange-600 border border-white hover:border-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
    >
      Cover File
    </div>
    <input
      id="cover"
      type="text"
      name="cover"
      class="w-full text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded focus:border-orange-300 focus:outline-none focus:ring-1 focus:ring-orange-300 focus:ring-opacity-40"
    />
  </div>
</template>
<script>
export default {
  name: "CoverInput",
  data() {
    return {
      open: function () {
        myWidget.open();
      },
    };
  },
};
const cloudName = "dr2ly0dd5"; // replace with your own cloud name
const uploadPreset = "vrglkscf"; // replace with your own upload preset

const myWidget = cloudinary.createUploadWidget(
  {
    cloudName: cloudName,
    uploadPreset: uploadPreset,
    // cropping: true, //add a cropping step
    // showAdvancedOptions: true,  //add advanced options (public_id and tag)
    // sources: [ "local", "url"], // restrict the upload sources to URL and local files
    // multiple: false,  //restrict upload to a single file
    folder: "covers", //upload files to the specified folder
    // tags: ["users", "profile"], //add the given tags to the uploaded files
    // context: {alt: "user_uploaded"}, //add the given context data to the uploaded files
    clientAllowedFormats: ["jpeg", "png", "jpg", "gpng"], //restrict uploading to image files only
    // maxImageFileSize: 2000000,  //restrict file size to less than 2MB
    // maxImageWidth: 2000, //Scales the image down to a width of 2000 pixels before uploading
    theme: "orange", //change to a purple theme
  },
  (error, result) => {
    if (!error && result && result.event === "success") {
      if (
        result.info.format == "GPNG" ||
        result.info.format == "jpg" ||
        result.info.format == "PNG"
      ) {
        localStorage.setItem("cover", result.info.url);
      }
      console.log(result.info.format);
      console.log("Done! Here is the cover info: ", result.info.url);
      document
        .getElementById("uploadedimage")
        .setAttribute("src", result.info.secure_url);
      document
        .getElementById("cover")
        .setAttribute("value", result.info.secure_url);
    }
  }
);
const widget = cloudinary.createUploadWidget(
  {
    cloudName: cloudName,
    uploadPreset: uploadPreset,
    // cropping: true, //add a cropping step
    // showAdvancedOptions: true,  //add advanced options (public_id and tag)
    // sources: [ "local", "url"], // restrict the upload sources to URL and local files
    // multiple: false,  //restrict upload to a single file
    folder: "audios", //upload files to the specified folder
    // tags: ["users", "profile"], //add the given tags to the uploaded files
    // context: {alt: "user_uploaded"}, //add the given context data to the uploaded files
    clientAllowedFormats: ["mp3"], //restrict uploading to image files only
    // maxImageFileSize: 2000000,  //restrict file size to less than 2MB
    // maxImageWidth: 2000, //Scales the image down to a width of 2000 pixels before uploading
    theme: "orange", //change to a purple theme
  },
  (error, result) => {
    if (!error && result && result.event === "success") {
      localStorage.setItem("podcast", result.info.url);

      console.log(result.info.format);
      console.log("Done! Here is the podcast info: ", result.info.url);
      document
        .getElementById("uploadedAudio")
        .setAttribute("src", result.info.secure_url);
      document
        .getElementById("podcast")
        .setAttribute("value", result.info.secure_url);
    }
  }
);
</script>
<style></style>
