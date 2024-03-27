<script setup>
defineProps(
    {
        title: String,
        icon: String
    }
)
</script>

<template>
    <h2>
        <i :class="icon"></i>
        {{ title }}
    </h2>
</template>

<style scoped>

</style>
