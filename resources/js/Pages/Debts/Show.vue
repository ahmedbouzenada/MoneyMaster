<template>
    <Head title="Debt Details"/>
    <div class="container my-5">
        <div class="card border-primary rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h5 class="mb-0">Debt Details</h5>
                <span class="badge bg-light text-primary">{{ debt.reference_number }}</span>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <h5 class="card-title mb-2">Client</h5>
                            <p class="card-text text-muted mb-0">{{ debt.client }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <h5 class="card-title mb-2">Amount</h5>
                            <p class="card-text positive-balance font-weight-bold mb-0">
                                {{ $filters.currency(debt.amount) }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <h5 class="card-title mb-2">Date</h5>
                            <p class="card-text text-muted mb-0">{{ debt.date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-end">
                <ReturnButton url="/debts" class="me-4" label="Debts"/>
                <ReturnButton :url="`/clients/${debt.client_id}`" label="Client"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import {defineProps} from 'vue';
import ReturnButton from "@/Components/Shared/Buttons/Links/ReturnButton.vue";

defineProps({
    debt: Object
});
</script>
