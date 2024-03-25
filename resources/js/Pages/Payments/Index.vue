<script setup>
import {Head} from "@inertiajs/vue3";
import Payments from "@/VueComponents/Payments.vue";

defineProps(
    {payments: Object}
)
</script>

<template>
    <Head title="Payments"/>
    <h1>Payments</h1>
    <Payments :payments></Payments>
</template>

<style scoped>

</style>
