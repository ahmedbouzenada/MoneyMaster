<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    clients: Object
});
</script>

<template>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Balance</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="client in clients.data" :key="client.id">
                    <td>{{ client.name }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ $filters.currency(client.balance) }}</td>
                    <td class="text-center">
                        <Link class="btn btn-sm btn-primary me-1" :href="`/clients/${client.id}`" title="View">
                            <i class="fas fa-eye"></i>
                        </Link>
                        <Link class="btn btn-sm btn-success me-1" :href="`/clients/${client.id}/edit`" title="Edit">
                            <i class="fas fa-edit"></i>
                        </Link>
                        <Link class="btn btn-sm btn-danger" :href="`/clients/${client.id}`" method="delete" as="button"
                              title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <pagination class="mt-6" :links="clients.meta.links"/>
</template>
