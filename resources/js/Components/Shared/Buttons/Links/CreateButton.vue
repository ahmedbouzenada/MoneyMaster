<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    createUrl: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        default: 'Create',
    },
});
</script>

<template>
    <Link :href="createUrl" class="btn btn-primary d-inline-flex align-items-center">
        <i class="fas fa-plus me-2"></i>
        {{ label }}
    </Link>
</template>
