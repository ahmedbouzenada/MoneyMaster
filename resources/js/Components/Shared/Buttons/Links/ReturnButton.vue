<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    url: String,
    label: String
})
</script>

<template>
    <Link :href="url" class="btn btn-close-white"><i class="fa-solid fa-circle-chevron-left me-2"></i>To {{ label }}</Link>
</template>

<style scoped>

</style>
