<script setup>
import {onMounted} from "vue";
import Chart from "chart.js/auto";

let props = defineProps({
    data: Array,
    canvasId: String,
    type: String,
    dataLabel: String,
    title: String
});
onMounted(() => {
    new Chart(
        document.getElementById(props.canvasId),
        {
            type: props.type,
            data: {
                labels: props.data.map(row => row.label),
                datasets: [
                    {
                        label: props.dataLabel,
                        data: props.data.map(row => row.value)
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
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-pie"></i> {{ title }}
            </div>
            <div class="card-body">
                <canvas :id="canvasId"></canvas>
            </div>
        </div>
    </div>
</template>
<style scoped>

</style>
