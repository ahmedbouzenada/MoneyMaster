<script setup>
import ClientInfo from "@/Components/Clients/ClientInfo.vue";
import ClientDues from "@/Components/Clients/ClientDues.vue";
import CloseButton from "@/Components/Shared/Buttons/Links/CloseButton.vue";
import {Head} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps(
    {client: Object}
)
</script>

<template>
    <Head title="Client Details"></Head>
    <PageHead title="Client Details" icon="fa-solid fa-user"></PageHead>
    <div class="row">
        <div class="col-md-3">
            <ClientInfo :client></ClientInfo>
        </div>
        <div class="col">
            <ClientDues title="Payments" type="payment" :client="client" :dues="client.payments"
                        icon="fa-solid fa-money-bill-wave"></ClientDues>
            <ClientDues title="Debts" type="debt" :client="client" class="mt-4" :dues="client.debts"
                        icon="fa-solid fa-hand-holding-dollar"></ClientDues>
            <div class="d-grid mt-4">
                <CloseButton url="/clients"></CloseButton>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
