<script setup>
defineProps(
    {
        dues: Object,
        title: String
    }
)
</script>

<template>
    <div class="card">
        <div class="card-header bg-primary text-white">
            {{ title }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                    v-for="due in dues" :key="due.id">
                    <div class="d-flex flex-column">
                        <span class="fw-bold">Reference: {{ due.reference_number }}</span>
                        <small class="text-muted">{{ due.date }}</small>
                    </div>
                    <span class="badge bg-success rounded-pill">{{
                            $filters.currency(due.amount)
                        }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
