<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
import ViewButton from "@/Components/Shared/Buttons/Links/ViewButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/Links/DeleteButton.vue";

let props = defineProps({
    payments: Object,
});
</script>

<template>
    <div class="table-responsive">
        <table class="table table-light  table-hover align-middle">
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Reference Number</th>
                <th scope="col">Client</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col" class="text-center"><i class="fas fa-eye"></i></th>
                <th scope="col" class="text-center "><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr v-for="(payment,index) in payments.data" :key="payment.id">
                <th scope="row">{{
                        (props.payments.meta.current_page - 1) * props.payments.meta.per_page + index + 1
                    }}
                </th>
                <td>{{ payment.reference_number }}</td>
                <td>{{ payment.client }}</td>
                <td>{{ $filters.currency(payment.amount) }}</td>
                <td>{{ payment.date }}</td>
                <td class="text-center">
                    <ViewButton :url="`/payments/${payment.id}`"></ViewButton>
                </td>
                <td class="text-center">
                    <DeleteButton :url="`/payments/${payment.id}`" item="payment"></DeleteButton>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <pagination class="mt-6" :links="payments.meta.links"/>
</template>
