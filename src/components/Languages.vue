<template>
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-sm p-1">
            {{ currentLanguageName }}
        </div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow">
            <li v-for="lang in languages" :key="lang.code">
                <a :href="getLink(lang.code)" :data-lang-code="lang.code"
                    :class="{ active: currentLanguage === lang.code }">
                    {{ lang.name }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { getRelativeLocaleUrl } from 'astro:i18n';

const getLink = (lang) => {
    return getRelativeLocaleUrl(lang, window.location.pathname);
}
</script>