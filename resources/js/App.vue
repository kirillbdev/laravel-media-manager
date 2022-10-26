<template>
  <div class="media-manager">
    <div v-if="store.isLocked">
      Loading...
    </div>
    <div v-else>
      <template v-for="file in store.files">
        <div v-if="file.isDir">{{ file.name }} [DIR]</div>
        <div v-else>{{ file.name }}</div>
      </template>
    </div>
  </div>
</template>

<script setup>
  import {onMounted} from 'vue';
  import {useStore, mutate} from 'store';

  const store = useStore();

  onMounted(() => store.loadFiles());
</script>
