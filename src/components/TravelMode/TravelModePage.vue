<template>
    <TravelModeHero :lang="lang" />

    <Features :lang="lang" />
</template>

<script setup>
import Features from './Features.vue'
import TravelModeHero from './TravelModeHero.vue'

const props = defineProps({
    lang: {
        type: String,
        default: 'en'
    }
})
</script>