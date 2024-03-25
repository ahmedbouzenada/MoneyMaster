<template>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Client</th>
            <th>Reference Number</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="debt in debts" :key="debt.id">
            <td>{{ debt.client }}</td>
            <td>{{ debt.reference_number }}</td>
            <td>{{ $filters.currency(debt.amount) }}</td>
            <td>{{ debt.date }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        debts: Array,
    },
}
</script>

<style>

</style>
