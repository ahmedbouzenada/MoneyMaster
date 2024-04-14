<script setup>
import {Head} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";
import CloseButton from "@/Components/Shared/Buttons/Links/CloseButton.vue";

defineProps({
    payment: Object
});
</script>

<template>
    <Head title="Payment Details"></Head>
    <PageHead icon="fa-solid fa-receipt" :title="`Payment Details - ${payment.reference_number}`"></PageHead>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Client</h5>
                    <p class="card-text">{{ payment.client }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Reference Number</h5>
                    <p class="card-text">{{ payment.reference_number }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Amount</h5>
                    <p class="card-text">{{ payment.amount }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Payment Method</h5>
                    <p class="card-text">{{ payment.payment_method }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Date</h5>
                    <p class="card-text">{{ payment.date }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 d-flex">
            <CloseButton url="/payments" class="flex-grow-1"></CloseButton>
        </div>
    </div>
</template>

<style scoped>
</style>
