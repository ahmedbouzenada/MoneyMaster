<template>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Reference Number</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="payment in payments" :key="payment.id">
                <td>{{ payment.reference_number }}</td>
                <td>{{ $filters.currency(payment.amount) }}</td>
                <td>{{ payment.payment_method }}</td>
                <td>{{ payment.date }}</td>
            </tr>
            </tbody>
        </table>
    </div>
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
