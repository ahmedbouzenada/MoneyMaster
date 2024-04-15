<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import ViewButton from "@/Components/Shared/Buttons/Links/ViewButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/Links/DeleteButton.vue";

let props = defineProps(
    {debts: Object}
)
</script>

<template>
    <div class="table-responsive">
        <table class="table table-light  table-hover align-middle">
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Reference Number</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col" class="text-center"><i class="fas fa-eye"></i></th>
                <th scope="col" class="text-center "><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr v-for="(debt,index) in debts.data" :key="debt.id">
                <th scope="row">{{
                        (props.debts.meta.current_page - 1) * props.debts.meta.per_page + index + 1
                    }}
                </th>
                <td>{{ debt.client }}</td>
                <td>{{ debt.reference_number }}</td>
                <td><span class="negative-balance">{{ $filters.currency(debt.amount) }}</span></td>
                <td>{{ debt.date }}</td>
                <td class="text-center">
                    <ViewButton :url="`/debts/${debt.id}`"></ViewButton>
                </td>
                <td class="text-center">
                    <DeleteButton :url="`/debts/${debt.id}`" item="debt"></DeleteButton>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <pagination class="mt-6" :links="debts.meta.links"/>
</template>
