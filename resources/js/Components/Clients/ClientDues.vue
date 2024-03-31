<script setup>
import ViewButton from "@/Components/Shared/Buttons/ViewButton.vue";
import EditButton from "@/Components/Shared/Buttons/EditButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/DeleteButton.vue";

defineProps(
    {
        dues: Object,
        title: String
    }
)
</script>

<template>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ title }}</h5>
            <div>
                <a href="#" class="btn btn-sm btn-light me-2"><i class="bi bi-plus"></i> Add</a>
                <a href="#" class="btn btn-sm btn-light"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
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
                      <span class="me-2">{{ $filters.currency(due.amount) }}</span>
                        <ViewButton url="#"></ViewButton>
                        <EditButton url="#"></EditButton>
                        <DeleteButton url="#"></DeleteButton>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
