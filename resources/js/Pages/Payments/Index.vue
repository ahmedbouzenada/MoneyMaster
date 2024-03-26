<script setup>
import Payments from "@/VueComponents/Payments.vue";
import {Head} from "@inertiajs/vue3";
import SearchForm from "@/VueComponents/SearchForm.vue";

defineProps(
    {payments: Object}
)
</script>

<template>
    <Head title="Payments"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-money-bill-wave me-2"></i>Payments</h2>
        <div class="d-flex">
            <SearchForm/>
        </div>
    </div>
    <Payments :payments></Payments>
</template>
