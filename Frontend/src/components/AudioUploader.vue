<template>
  <div>
    <label
      for="podcast"
      class="block text-sm text-gray-700 capitalize dark:text-gray-200"
      >Podcast File</label
    >
    <input
      id="podcast"
      type="file"
      name="podacst"
      class="block w-full mt-2 text-gray-600 placeholder-gray-400 bg-white border-none rounded focus:border-indigo-400 focus:outline-none focus:ring focus:ring-orange-300 focus:ring-opacity-40"
    />
  </div>
</template>
<script>
export default {
  name: "AudioUploader",
  data() {
    return {
      open: function () {
        widget.open();
      },
    };
  },
};
const cloudName = "dr2ly0dd5"; // replace with your own cloud name
const uploadPreset = "yd12wypw"; // replace with your own upload preset

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
