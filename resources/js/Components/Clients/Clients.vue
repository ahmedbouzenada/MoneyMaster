<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import {Link} from "@inertiajs/vue3";

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
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="client in clients.data" :key="client.id">
            <td>{{ client.name }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ $filters.currency(client.balance) }}</td>
            <td>
                <Link class="btn btn-primary btn-sm mx-1" :href="`/clients/${client.id}`">
                    <i class="fa-solid fa-eye"></i>
                </Link>
                <Link class="btn btn-success btn-sm mx-1" :href="`/clients/${client.id}/edit`">
                    <i class="fa-solid fa-pen-to-square"></i>
                </Link>
                <Link class="btn btn-danger btn-sm mx-1" :href="`/clients/${client.id}`" method="delete" as="button">
                    <i class="fa-solid fa-trash"></i>
                </Link>
            </td>
        </tr>
        </tbody>
    </table>
    <pagination class="mt-6" :links="clients.meta.links"/>
</template>
