<script setup>
defineProps({
    label: String,
    icon: {
        type: String,
        default: 'fa-solid fa-trash'
    }
})
</script>

<template>
    <button class="btn btn-danger"><i :class="`${icon} me-2`"></i>{{ label }}</button>
</template>

<style scoped>

</style>
