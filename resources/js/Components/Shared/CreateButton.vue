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
    <a :href="createUrl" class="btn btn-primary d-inline-flex align-items-center">
        <i class="fas fa-plus me-2"></i>
        <span>{{ label }}</span>
    </a>
</template>
