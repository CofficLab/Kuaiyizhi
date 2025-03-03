<template>
    <div class="flex flex-col gap-1 card bg-base-100 shadow-xl p-4 rounded-md">
        <a :href="`/blogs/tags/${tag}`" v-for="tag in tags" :key="tag" class="badge badge-primary no-underline">
            {{ tag }}
        </a>
    </div>
</template>

<script>
export default {
    props: {
        tags: {
            type: Array,
            required: true
        }
    }
}
</script>