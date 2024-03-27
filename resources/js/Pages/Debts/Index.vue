<script setup>
import Debts from "@/Components/Debts/Debts.vue";
import SearchForm from "@/Components/Shared/SearchForm.vue";
import {Head} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps(
    {debts: Object}
)
</script>

<template>
    <Head title="Debts"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <PageHead icon="fas fa-landmark me-2" title="Debts"></PageHead>
        <div class="d-flex">
            <SearchForm :route="'/debts'"/>
        </div>
    </div>
    <Debts :debts></Debts>
</template>
