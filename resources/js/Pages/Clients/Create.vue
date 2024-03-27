<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";

let form = useForm({
    firstname: '',
    lastname: '',
    email: '',
    birthdate: '',
    phone_number: '',
});

</script>

<template>
    <Head title="New Client"></Head>
    <PageHead icon="fa-solid fa-square-plus" title="New Client"></PageHead>
    <form @submit.prevent="form.post('/clients')" class="row g-3">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input v-model="form.firstname" type="text" class="form-control" id="firstname"
                       :class="{ 'is-invalid': form.errors.firstname }">
                <div v-if="form.errors.firstname" class="invalid-feedback">{{ form.errors.firstname }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input v-model="form.lastname" type="text" class="form-control" id="lastname"
                       :class="{ 'is-invalid': form.errors.lastname }">
                <div v-if="form.errors.lastname" class="invalid-feedback">{{ form.errors.lastname }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input v-model="form.email" type="email" class="form-control" id="email"
                       :class="{ 'is-invalid': form.errors.email }">
                <div v-if="form.errors.email" class="invalid-feedback">{{ form.errors.email }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input v-model="form.birthdate" type="date" class="form-control" id="birthdate"
                       :class="{ 'is-invalid': form.errors.birthdate }">
                <div v-if="form.errors.birthdate" class="invalid-feedback">{{ form.errors.birthdate }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input v-model="form.phone_number" type="text" class="form-control" id="phone"
                       :class="{ 'is-invalid': form.errors.phone_number }">
                <div v-if="form.errors.phone_number" class="invalid-feedback">{{ form.errors.phone_number }}</div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" :disabled="form.processing">Confirm</button>
            <Link href="/clients" class="btn btn-secondary mx-2">Return</Link>
        </div>
    </form>
</template>

<style scoped>

</style>
