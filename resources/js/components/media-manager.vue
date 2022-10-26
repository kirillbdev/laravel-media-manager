<template>
    <div class="media-manager">
        <div v-if="locked" class="media-manager-loader">Locked</div>
        <template v-for="file in getFiles()">
            <div v-if="file.isDir">{{ file.name }} [DIR]</div>
            <div v-else>{{ file.name }}</div>
        </template>
    </div>
</template>

<script setup>
import { getFiles } from '../store/getters';
</script>
