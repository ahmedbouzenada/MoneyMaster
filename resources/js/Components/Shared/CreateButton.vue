<script setup>
defineProps({
    createUrl: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        default: 'Create',
    },
});
</script>

<template>
    <a :href="createUrl" class="btn btn-primary">
        <i class="fa-solid fa-plus me-2"></i>{{ label }}
    </a>
</template>
