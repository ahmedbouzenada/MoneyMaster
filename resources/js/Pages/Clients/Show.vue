<script setup>
import ClientInfo from "@/Components/Clients/ClientInfo.vue";
import ClientDues from "@/Components/Clients/ClientDues.vue";
import CloseButton from "@/Components/Shared/Buttons/CloseButton.vue";

defineProps(
    {client: Object}
)
</script>

<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <ClientInfo :client></ClientInfo>
            </div>
            <div class="col">
                <ClientDues title="Payments" :dues="client.payments"></ClientDues>
                <ClientDues title="Debts" class="mt-4" :dues="client.debts"></ClientDues>
                <div class="d-grid mt-4">
                    <CloseButton url="/clients"></CloseButton>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
