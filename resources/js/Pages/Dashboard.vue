<script setup>
import Chart from 'chart.js/auto';
import {onMounted} from "vue";
import DashboardInfo from "@/Components/Shared/DashboardInfo.vue";

let props = defineProps({
    totalClients: Number,
    totalPayments: Number,
    totalDebts: Number,
    totalMoney: Number,
    balance: Number,
})

onMounted(() => {
    const data = [
        {label: 'debts', percent: (props.totalDebts / props.totalMoney) * 100},
        {label: 'payments', percent: (props.totalPayments / props.totalMoney) * 100},
    ];
    new Chart(
        document.getElementById('payments/debts'),
        {
            type: 'doughnut',
            data: {
                labels: data.map(row => row.label),
                datasets: [
                    {
                        label: '%',
                        data: data.map(row => row.percent)
                    }
                ]
            },
            options: {
                responsive: true
            }
        }
    );
});

</script>

<template>
    <div class="container-fluid">
        <div class="row">
            <DashboardInfo icon="fas fa-users" :value="totalClients" description="Total Clients"
                           color="bg-primary"></DashboardInfo>
            <DashboardInfo icon="fas fa-money-bill-wave" :value="$filters.currency(totalPayments)"
                           description="Total Payments" color="bg-success"></DashboardInfo>
            <DashboardInfo icon="fas fa-hand-holding-usd" :value="$filters.currency(totalDebts)"
                           description="Total Debts" color="bg-danger"></DashboardInfo>
            <DashboardInfo icon="fas fa-balance-scale" :value="$filters.currency(balance)"
                           description="Global Balance" color="bg-warning"></DashboardInfo>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i> Debts and Payments
                    </div>
                    <div class="card-body">
                        <canvas id="payments/debts"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
