<template>
    <JuiceEditorHero :lang="lang" />

    <Features :lang="lang" />
</template>

<script setup>
import Features from './Features.vue'
import JuiceEditorHero from './JuiceEditorHero.vue'

const props = defineProps({
    lang: {
        type: String,
        default: 'en'
    }
})
</script>
