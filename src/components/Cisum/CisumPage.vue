<template>
    <CisumHero :lang="lang" />
    <Features :lang="lang" />
</template>

<script setup lang="ts">
import Features from './Features.vue'
import CisumHero from './CisumHero.vue'

defineProps({
    lang: {
        type: String,
        default: 'en'
    }
})
</script>
