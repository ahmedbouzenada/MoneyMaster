<script setup>
import ClientInfo from "@/Components/Clients/ClientInfo.vue";
import ClientDues from "@/Components/Clients/ClientDues.vue";

defineProps(
    {client: Object}
)
</script>

<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <ClientInfo :client></ClientInfo>
            </div>
            <div class="col-md-8">
                <ClientDues title="Payments" :dues="client.payments"></ClientDues>
                <ClientDues title="Debts" class="mt-4" :dues="client.debts"></ClientDues>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
