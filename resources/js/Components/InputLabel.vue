<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="d-block fw-semibold text-muted small">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot/></span>
    </label>
</template>
