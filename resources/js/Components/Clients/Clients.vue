<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import ViewButton from "@/Components/Shared/Buttons/ViewButton.vue";
import EditButton from "@/Components/Shared/Buttons/EditButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/DeleteButton.vue";

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
                        <ViewButton :url="`/clients/${client.id}`"></ViewButton>
                        <EditButton :url="`/clients/${client.id}/edit`"></EditButton>
                        <DeleteButton :url="`/clients/${client.id}`"></DeleteButton>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <pagination class="mt-6" :links="clients.meta.links"/>
</template>
