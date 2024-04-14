<script setup>
import EditButton from "@/Components/Shared/Buttons/Links/EditButton.vue";
import DeleteButton from "@/Components/Shared/Buttons/Links/DeleteButton.vue";

const props = defineProps(
    {client: Object}
)

const balanceStyle = (balance) => {
    return balance < 0 ? 'negative-balance' : 'positive-balance'
};
</script>

<template>
    <div class="card mb-3">
        <img src="../../../../public/images/user.png" class="card-img-top" alt="Client Image">
        <div class="card-body">
            <h5 class="card-title text-primary">
                <i class="fa-solid fa-user me-2"></i>{{ client.name }}
            </h5>
            <p class="card-text mb-1"><i class="fa-solid fa-at me-2 "></i>{{ client.email }}</p>
            <p class="card-text mb-1"><i class="fa-regular fa-calendar me-2"></i>{{ client.birth_date }}</p>
            <p class="card-text mb-1"><i class="fa-solid fa-phone me-2"></i>{{ client.phone }}</p>
            <p class="card-text"
               :class="balanceStyle(client.balance)"
            ><i class="fa-solid fa-scale-balanced me-2"></i>{{ $filters.currency(client.balance) }}
            </p>
            <div class="row text-center g-1">
                <EditButton :url="`/clients/${client.id}/edit`"></EditButton>
                <DeleteButton :url="`/clients/${client.id}`" item="client"></DeleteButton>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
