<script setup>
import Pagination from "../VueComponents/Pagination.vue";

defineProps({
    clients: Object
});
</script>

<template>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="client in clients.data" :key="client.id">
            <td>{{ client.name }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ $filters.currency(client.balance) }}</td>
        </tr>
        </tbody>
    </table>
    <pagination class="mt-6" :links="clients.meta.links"/>
</template>

<style>
</style>
