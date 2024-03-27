<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";

defineProps(
    {debts: Object}
)
</script>

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
        <tr v-for="debt in debts.data" :key="debt.id">
            <td>{{ debt.client }}</td>
            <td>{{ debt.reference_number }}</td>
            <td>{{ $filters.currency(debt.amount) }}</td>
            <td>{{ debt.date }}</td>
        </tr>
        </tbody>
    </table>
    <pagination class="mt-6" :links="debts.meta.links"/>
</template>
