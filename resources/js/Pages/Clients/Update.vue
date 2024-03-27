<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";

let props = defineProps({
    client: Object
});
let form = useForm({
    firstname: props.client.firstname,
    lastname: props.client.lastname,
    email: props.client.email,
    birthdate: props.client.birthdate,
    phone_number: props.client.phone_number,
});

</script>

<template>
    <Head title="Edit Client Details"></Head>
    <PageHead icon="fa-solid fa-pen-to-square" title="Edit Client Details"></PageHead>
    <form @submit.prevent="form.put(`/clients/${client.id}`)">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input v-model="form.firstname" type="text" class="form-control" id="firstname">
                    <div v-if="form.errors.firstname" class="form-text">{{ form.errors.firstname }}</div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input v-model="form.lastname" type="text" class="form-control" id="lastname">
                    <div v-if="form.errors.lastname" class="form-text">{{ form.errors.lastname }}</div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input v-model="form.email" type="email" class="form-control" id="email">
            <div v-if="form.errors.email" class="form-text">{{ form.errors.email }}</div>
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input v-model="form.birthdate" type="date" class="form-control" id="birthdate">
            <div v-if="form.errors.birthdate" class="form-text">{{ form.errors.birthdate }}</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input v-model="form.phone_number" type="text" class="form-control" id="phone">
            <div v-if="form.errors.phone_number" class="form-text">{{ form.errors.phone_number }}</div>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="form.processing">Confirm</button>
    </form>
</template>

<style scoped>

</style>
