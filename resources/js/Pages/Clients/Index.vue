<script setup>
import Clients from "@/Components/Clients/Clients.vue";
import CreateButton from "@/Components/Shared/Buttons/CreateButton.vue";
import {Head} from "@inertiajs/vue3";
import SearchForm from "@/Components/Shared/SearchForm.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps(
    {clients: Object}
)
</script>

<template>
    <Head title="Clients"/>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <PageHead icon="fas fa-users" title="Clients"></PageHead>
        <div class="d-flex">
            <SearchForm :route="'/clients'" class="me-3"/>
            <CreateButton create-url="/clients/create" label="Add Client"/>
        </div>
    </div>
    <Clients :clients></Clients>
</template>

