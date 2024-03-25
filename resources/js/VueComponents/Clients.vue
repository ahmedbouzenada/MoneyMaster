<template>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients" :key="client.id">
                <td>{{ client.id }}</td>
                <td>{{ client.firstname }} {{ client.lastname }}</td>
                <td>{{ client.email }}</td>
                <td>{{ $filters.currency(client.balance) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
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
