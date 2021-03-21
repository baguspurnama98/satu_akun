<template>
<!-- ini coba coba utk ngetest apakah upload video bisa -->
  <input type="file" @change="setVideo" />
</template>

<script>
export default {
  data() {
    return {
      media_blob: null,
    };
  },

  methods: {
    setVideo(e) {
      if (e !== null || e.target.files) {
        this.media_blob = e.target.files[0];
        let formData = new FormData();
        formData.append("media_blob", this.media_blob);

        this.$axios
          .$post(`report/upload/`, formData)
          .then((resp) => {
            console.log(resp);
          })
          .catch((errors) => {
            console.dir(errors);
          });
      }
    },
  },
};
</script>
