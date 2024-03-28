<script setup>
defineProps({
    icon: String,
    value: Number,
    description: String,
    color: String
})
</script>

<template>
    <div class="col-lg-6 col-md-6">
        <div :class="`card ${color} text-white mb-4`">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i :class="`${icon} fa-3x`"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ value }}</h5>
                        <small>{{ description }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
