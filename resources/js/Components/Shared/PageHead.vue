<script setup>
defineProps(
    {
        title: String,
        icon: String
    }
)
</script>

<template>
    <h2 class="d-flex align-items-center mb-4">
        <i :class="`${icon} me-2`"></i>
        <span>{{ title }}</span>
    </h2>
</template>

<style scoped>

</style>
