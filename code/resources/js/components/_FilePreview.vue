<template>
  <div>
    <input
      type="file"
      accept="image/*"
      @change="onImageChange"
      :name="name"
    />

    <img
      class="userInfo__icon"
      v-show="uploadedImage"
      :src="uploadedImage"
    >
  </div>

</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: "",
    },
    src: {
      type: String,
      default: "",
    },
  },
  data: function () {
    return {
      uploadedImage: this.src,
    };
  },
  methods: {
    onImageChange(e) {
      const files = e.target.files;
      if (files.length > 0) {
        this.createImage(files[0]);
      } else {
        this.uploadedImage = this.src;
      }
    },
    createImage(file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.uploadedImage = e.target.result;
      };
      reader.readAsDataURL(file);
    },
  },
};
</script>

<style>
</style>
