<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
        url: String,
    }
)
</script>

<template>
    <Link class="btn btn-sm btn-success" :href="url">
        <i class="fas fa-edit"></i>
    </Link>
</template>

<style scoped>

</style>
