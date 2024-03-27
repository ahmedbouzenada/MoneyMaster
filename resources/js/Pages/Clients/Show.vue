<script setup>
defineProps(
    {client: Object}
)
</script>

<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="/public/images/user.png" class="card-img-top" alt="Client Image">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-user me-2"></i>{{ client.name }}</h5>
                        <p class="card-text"><i class="fa-solid fa-at me-2"></i>{{ client.email }}</p>
                        <p class="card-text"><i class="fa-regular fa-calendar me-2"></i>{{ client.birth_date }}</p>
                        <p class="card-text"><i class="fa-solid fa-phone me-2"></i>{{ client.phone }}</p>
                        <p class="card-text"><i
                            class="fa-solid fa-scale-balanced me-2"></i>{{ $filters.currency(client.balance) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Payments
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                v-for="payment in client.payments" :key="payment.id">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Reference: {{ payment.reference_number }}</span>
                                    <small class="text-muted">{{ payment.date }}</small>
                                </div>
                                <span class="badge bg-success rounded-pill">{{
                                        $filters.currency(payment.amount)
                                    }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        Debts
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                v-for="debt in client.debts" :key="debt.id">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Reference: {{ debt.reference_number }}</span>
                                    <small class="text-muted">{{ debt.date }}</small>
                                </div>
                                <span class="badge bg-danger rounded-pill">{{ $filters.currency(-debt.amount) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
