<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    url: String
})
</script>

<template>
    <Link :href="url" class="btn btn-secondary me-2"><i class="fa-solid fa-xmark me-2"></i>Close</Link>
</template>

<style scoped>

</style>
