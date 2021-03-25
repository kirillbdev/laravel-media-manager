<template>
  <div v-bind:data-url="file.url"
       v-on:dblclick="$emit('select', file)"
       class="media-manager-file media-manager-file--dir">
    <div class="media-manager-file__inner">
      <img class="media-manager-file__dir-img" src="/image/media-manager/folder.png">
      <div class="media-manager-file__dir-name">{{ file.name }}</div>
      <div class="media-manager-file__info media-manager-file__info--dir">
        <div class="media-manager-file__actions">
          <a href="#" @click.prevent="rename" class="media-manager-file__action-btn">{{ $t('btn_rename') }}</a>
          <a href="#" @click.prevent="remove" class="media-manager-file__action-btn">{{ $t('btn_remove') }}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AbstractFile from './../mixins/file';

  export default {
    mixins: [
      AbstractFile
    ]
  }
</script>