<script setup>
import ClientInfo from "@/Components/Clients/ClientInfo.vue";
import ClientDues from "@/Components/Clients/ClientDues.vue";
import {Head} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";
import SimpleCloseButton from "@/Components/Shared/Buttons/Links/SimpleCloseButton.vue";

defineProps(
    {client: Object}
)
</script>

<template>
    <Head title="Client Details"></Head>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <PageHead title="Client Details" icon="fa-solid fa-user"></PageHead>
        <SimpleCloseButton url="/clients"></SimpleCloseButton>
    </div>
    <div class="row">
        <div class="col-md-3">
            <ClientInfo :client></ClientInfo>
        </div>
        <div class="col">
            <ClientDues title="Payments" type="payment" :client="client" :dues="client.payments"
                        icon="fa-solid fa-money-bill-wave"></ClientDues>
            <ClientDues title="Debts" type="debt" :client="client" class="mt-4" :dues="client.debts"
                        icon="fa-solid fa-hand-holding-dollar"></ClientDues>
        </div>
    </div>
</template>

<style scoped>

</style>
