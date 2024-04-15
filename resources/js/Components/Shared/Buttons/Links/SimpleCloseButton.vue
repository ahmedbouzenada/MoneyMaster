<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    url: String
})
</script>

<template>
    <Link :href="url" class="btn-close"></Link>
</template>

<style scoped>

</style>
