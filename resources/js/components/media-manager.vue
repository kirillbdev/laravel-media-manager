<template>
  <div class="media-manager">
    <div v-if="locked" class="media-manager-loader">Locked</div>
    <template v-for="file in files">
        <div v-if="file.is_dir">{{ file.name }} [DIR]</div>
        <div v-else>{{ file.name }}</div>
    </template>
  </div>
</template>

<script>
  import { mapState, mapActions } from 'vuex';

  export default {
    mounted () {
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
