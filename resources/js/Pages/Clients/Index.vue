<template>
    <Head title="Clients"/>
    <h1>Clients</h1>
    <Clients :clients></Clients>
</template>

<script setup>
import Clients from '../../VueComponents/Clients.vue'
import {Head} from '@inertiajs/vue3'

defineProps(
    {clients: Object}
)

</script>
