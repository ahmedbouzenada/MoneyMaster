<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import ViewButton from "@/Components/Shared/Buttons/Links/ViewButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/Links/DeleteButton.vue";

let props = defineProps({
    clients: Object
});
const balanceStyle = (balance) => {
    return balance < 0 ? 'negative-balance' : 'positive-balance'
};
</script>

<template>

    <div class="table-responsive">
        <table class="table table-light  table-hover align-middle">
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Balance</th>
                <th scope="col" class="text-center"><i class="fas fa-eye"></i></th>
                <th scope="col" class="text-center "><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr v-for="(client,index) in clients.data" :key="client.id">
                <th scope="row">{{
                        (props.clients.meta.current_page - 1) * props.clients.meta.per_page + index + 1
                    }}
                </th>
                <td>{{ client.name }}</td>
                <td>{{ client.email }}</td>
                <td>{{ client.phone }}</td>
                <td><span :class="balanceStyle(client.balance)">{{ $filters.currency(client.balance) }}</span></td>
                <td class="text-center">
                    <ViewButton :url="`/clients/${client.id}`"></ViewButton>
                </td>
                <td class="text-center">
                    <DeleteButton :url="`/clients/${client.id}`" item="client"></DeleteButton>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <pagination class="mt-6" :links="clients.meta.links"/>
</template>
