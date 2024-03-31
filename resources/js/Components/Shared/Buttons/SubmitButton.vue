<script setup>
defineProps({
    form: Object,
    text: String,
    icon: {
        type: String,
        default: 'fa-solid fa-check'
    }
})
</script>

<template>
    <button type="submit" class="btn btn-success" :disabled="form.processing"><i
        :class="`${icon} me-2`"></i>{{ text }}
    </button>
</template>

<style scoped>

</style>
