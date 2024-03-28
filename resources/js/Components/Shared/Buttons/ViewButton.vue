<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
        url: String,
    }
)
</script>

<template>
    <Link class="btn btn-sm btn-primary" :href="url">
        <i class="fas fa-eye"></i>
    </Link>
</template>

<style scoped>

</style>
