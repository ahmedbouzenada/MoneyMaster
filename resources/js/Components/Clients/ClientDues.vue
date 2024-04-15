<script setup>
import ViewButton from "@/Components/Shared/Buttons/Links/ViewButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/Links/DeleteButton.vue";
import CreateButton from "@/Components/Shared/Buttons/Links/CreateButton.vue";

let props = defineProps(
    {
        dues: Object,
        title: String,
        client: Object,
        type: String,
        icon: String,

    }
)

const balanceStyle = (type) => {
    return type === "debt" ? 'negative-balance' : 'positive-balance'
};
</script>

<template>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i :class="`${icon} me-2`"></i>{{ title }}</h5>
            <div>
                <CreateButton :create-url="`/${type}s/create?client_id=${client.id}`"
                              :label="`Add ${type}`"></CreateButton>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                    v-for="due in dues" :key="due.id">
                    <div class="d-flex flex-column">
                        <span class="fw-bold">Reference: {{ due.reference_number }}</span>
                        <small class="text-muted">{{ due.date }}</small>
                    </div>
                    <div>
                        <span class="me-4" :class="balanceStyle(type)">{{ $filters.currency(due.amount) }}</span>
                        <ViewButton :url="`/${type}s/${due.id}`" class="me-2"></ViewButton>
                        <DeleteButton :url="`/${type}s/${due.id}`" :item="type"></DeleteButton>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
