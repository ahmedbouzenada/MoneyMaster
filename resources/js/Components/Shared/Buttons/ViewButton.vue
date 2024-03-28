<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
        url: String,
    }
)
</script>

<template>
    <Link class="btn btn-sm btn-primary me-1" :href="url">
        <i class="fas fa-eye"></i>
    </Link>
</template>

<style scoped>

</style>
