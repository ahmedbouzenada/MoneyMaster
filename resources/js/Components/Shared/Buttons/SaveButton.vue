<script setup>
defineProps({
    form: Object,
    text: String
})
</script>

<template>
    <button type="submit" class="btn btn-success" :disabled="form.processing"><i
        class="fa-solid fa-floppy-disk me-2"></i>{{ text }}
    </button>
</template>

<style scoped>

</style>
