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

<script>
import Pagination from "@/VueComponents/Pagination.vue";

export default {
    components: {
        Pagination
    },
    props: {
        debts: Array,
    },
}
</script>

<style>

</style>
