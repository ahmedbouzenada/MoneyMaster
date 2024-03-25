<script setup>
import {Head} from "@inertiajs/vue3";
import Debts from "@/VueComponents/Debts.vue";

defineProps(
    {debts: Object}
)
</script>

<template>
    <Head title="Debts"/>
    <h1>Debts</h1>
    <Debts :debts></Debts>
</template>

<style scoped>

</style>
