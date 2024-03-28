<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
        url: String,
    }
)
</script>

<template>
    <Link class="btn btn-sm btn-danger" :href="url" method="delete" as="button">
        <i class="fas fa-trash-alt"></i>
    </Link>
</template>

<style scoped>

</style>
