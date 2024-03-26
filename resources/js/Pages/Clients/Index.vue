<script setup>
import Clients from '../../VueComponents/Clients.vue'
import CreateButton from '../../VueComponents/CreateButton.vue'

defineProps(
    {clients: Object}
)
</script>

<template>
    <Head title="Clients"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-users me-2"></i>Clients</h2>
        <div class="d-flex">
            <SearchForm class="me-3"/>
            <CreateButton create-url="/clients/create" label="Create Client"/>
        </div>
    </div>
    <Clients :clients></Clients>
</template>

