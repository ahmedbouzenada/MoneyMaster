<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-danger small0">
            {{ message }}
        </p>
    </div>
</template>
