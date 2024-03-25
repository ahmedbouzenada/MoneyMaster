<template>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="client in clients" :key="client.id">
            <td>{{ client.name }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ $filters.currency(client.balance) }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        clients: Array,
    },
}
</script>

<style>
</style>
