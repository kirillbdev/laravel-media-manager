<template>
  <div class="media-manager">
    <div v-if="locked" class="media-manager-loader">Locked</div>
    <div v-for="file in files">{{ file.name }}</div>
  </div>
</template>

<script>
  import { mapState, mapActions } from 'vuex';

  export default {
    mounted: function () {
      this.getFiles();
    },
    computed: mapState([
      'locked',
      'files'
    ]),
    methods: mapActions([
      'getFiles'
    ])
  }
</script>