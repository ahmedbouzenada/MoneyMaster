<script setup>
defineProps({
    form: Object,
    text: String
})
</script>

<template>
    <button type="submit" class="btn btn-success me-2" :disabled="form.processing"><i
        class="fa-solid fa-check me-2"></i>{{ text }}
    </button>
</template>

<style scoped>

</style>
