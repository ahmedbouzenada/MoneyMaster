<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
        url: String,
    text: {
        type: String,
        default: '',
    }
    }
)
</script>

<template>
    <Link class="btn btn-sm btn-danger" :href="url" method="delete" as="button">
        <i class="fas fa-trash-alt" :class="{'me-2':text}"></i> {{ text }}
    </Link>
</template>

<style scoped>

</style>
