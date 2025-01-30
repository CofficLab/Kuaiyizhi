<template>
    <JuiceNoteHero :lang="lang" />

    <Features :lang="lang" />
</template>

<script setup>
import Features from './Features.vue'
import JuiceNoteHero from './JuiceNoteHero.vue'

const props = defineProps({
    lang: {
        type: String,
        default: 'en'
    }
})
</script>