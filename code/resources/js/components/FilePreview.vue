<template>
  <div>
    　<input
      class="form-input"
      type="file"
      name="photo_id"
      accept="image/*"
      v-on:change="onFileChange"
    >

    <img
      class="userInfo__icon"
      v-bind:src="imageData"
      v-if="imageData"
    >
  </div>

</template>

<script>
export default {
  props: {
    src: {
      type: String,
      default: "",
    },
  },
  data: function () {
    return {
      imageData: "",
    };
  },
  methods: {
    onFileChange(e) {
      const files = e.target.files;

      if (files.length > 0) {
        const file = files[0];
        const reader = new FileReader();

        reader.onload = (e) => {
          this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
  },
};
</script>

<style>
</style>
