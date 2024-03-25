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
            <tr v-for="payment in payments" :key="payment.id">
                <td>{{ payment.client }}</td>
                <td>{{ payment.reference_number }}</td>
                <td>{{ $filters.currency(payment.amount) }}</td>
                <td>{{ payment.date }}</td>
            </tr>
            </tbody>
        </table>
</template>

<script>
export default {
    props: {
        payments: Array,
    },
}
</script>

<style>

</style>
