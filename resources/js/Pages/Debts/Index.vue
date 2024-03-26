<script setup>
import Debts from "@/VueComponents/Debts.vue";
import SearchForm from "@/VueComponents/SearchForm.vue";
import {Head} from "@inertiajs/vue3";

defineProps(
    {debts: Object}
)
</script>

<template>
    <Head title="Debts"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-landmark me-2"></i>Debts</h2>
        <div class="d-flex">
            <SearchForm :route="'/debts'"/>
        </div>
    </div>
    <Debts :debts></Debts>
</template>
