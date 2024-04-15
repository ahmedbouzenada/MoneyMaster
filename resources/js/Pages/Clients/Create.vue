<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";
import CloseButton from "@/Components/Shared/Buttons/Links/CloseButton.vue";
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputEmail from "@/Components/Shared/Forms/FormInputEmail.vue";
import FormInputDate from "@/Components/Shared/Forms/FormInputDate.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";


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
    <form @submit.prevent="form.post('/clients')">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputText :form id="firstname" title="First Name" v-model="form.firstname"></FormInputText>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputText :form id="lastname" title="Last Name" v-model="form.lastname"></FormInputText>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputEmail :form id="email" title="Email" v-model="form.email"></FormInputEmail>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputDate :form id="birthdate" title="Birth Date" v-model="form.birthdate"></FormInputDate>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputText :form id="phone_number" title="Phone Number"
                                   v-model="form.phone_number"></FormInputText>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 d-flex">
                <SubmitButton :form label="Save" icon="fa-solid fa-floppy-disk" class="flex-grow-1 me-2"></SubmitButton>
                <CloseButton url="/clients" class="flex-grow-1"></CloseButton>
            </div>
        </div>
    </form>

</template>

<style scoped>

</style>
