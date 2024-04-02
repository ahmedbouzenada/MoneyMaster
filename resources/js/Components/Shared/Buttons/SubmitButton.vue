<script setup>
defineProps({
    form: Object,
    label: String,
    icon: {
        type: String,
        default: 'fa-solid fa-check'
    },
    btnStyle: {
        type: String,
        default: 'btn btn-success'
    },
})
</script>

<template>
    <button type="submit" :class="btnStyle" :disabled="form.processing"><i
        :class="`${icon} me-2`"></i>{{ label }}
    </button>
</template>

<style scoped>

</style>
