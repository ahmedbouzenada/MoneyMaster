<script setup>
import Payments from "@/Components/Payments/Payments.vue";
import {Head} from "@inertiajs/vue3";
import SearchForm from "@/Components/Shared/SearchForm.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps(
    {
        payments: Object,
    }
)
</script>

<template>
    <Head title="Payments"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <PageHead icon="fas fa-money-bill-wave me-2" title="Payments"></PageHead>
        <div class="d-flex">
            <SearchForm :route="'/payments'"/>
        </div>
    </div>
    <Payments :payments></Payments>
</template>
