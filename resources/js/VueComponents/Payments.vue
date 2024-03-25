<template>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>Client</th>
            <th>Reference Number</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="payment in payments.data" :key="payment.id">
            <td>{{ payment.client }}</td>
            <td>{{ payment.reference_number }}</td>
            <td>{{ $filters.currency(payment.amount) }}</td>
            <td>{{ payment.date }}</td>
        </tr>
        </tbody>
    </table>
    <pagination class="mt-6" :links="payments.meta.links"/>
</template>

<script>
import Pagination from "@/VueComponents/Pagination.vue";

export default {
    components: {
        Pagination
    },
    props: {
        payments: Array,
    },
}
</script>

<style>

</style>
