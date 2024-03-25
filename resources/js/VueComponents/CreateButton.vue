<template>
    <a :href="createUrl" class="btn btn-primary">
        <i class="bi bi-plus me-2"></i>{{ label }}
    </a>
</template>

<script>
export default {
    props: {
        createUrl: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            default: 'Create',
        },
    },
};
</script>
