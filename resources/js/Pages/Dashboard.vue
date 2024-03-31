<script setup>
import DashboardInfo from "@/Components/Shared/DashboardInfo.vue";
import {Head} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";

let props = defineProps({
    totalClients: Number,
    totalPayments: Number,
    totalDebts: Number,
    totalMoney: Number,
    balance: Number,
    averageDailyPayments: Number,
    averageDailyDebts: Number
})
const data = [
    {label: 'debts', value: props.totalMoney === 0 ? 0 : (props.totalDebts / props.totalMoney) * 100},
    {label: 'payments', value: props.totalMoney === 0 ? 0 : (props.totalPayments / props.totalMoney) * 100},
];
</script>

<template>
    <Head title="Dashboard"></Head>
    <div class="container-fluid">
        <PageHead icon="fas fa-gauge-high" title="Dashboard"></PageHead>
        <div class="row">
            <DashboardInfo icon="fas fa-users" :value="totalClients.toString()" description="Total Clients"
                           color="bg-primary"></DashboardInfo>
            <DashboardInfo icon="fas fa-money-bill-wave" :value="$filters.currency(totalPayments)"
                           description="Total Payments" color="bg-success"></DashboardInfo>
            <DashboardInfo icon="fas fa-hand-holding-usd" :value="$filters.currency(totalDebts)"
                           description="Total Debts" color="bg-danger"></DashboardInfo>
            <DashboardInfo icon="fas fa-balance-scale" :value="$filters.currency(balance)"
                           description="Global Balance" color="bg-warning"></DashboardInfo>
            <DashboardInfo icon="fa-solid fa-coins" :value="$filters.currency(averageDailyPayments)"
                           description="Daily Payments Average" color="bg-success"></DashboardInfo>
            <DashboardInfo icon="fa-solid fa-piggy-bank" :value="$filters.currency(averageDailyDebts)"
                           description="Daily Debts Average" color="bg-danger"></DashboardInfo>
        </div>
    </div>

</template>

<style scoped>

</style>
