<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputEmail from "@/Components/Shared/Forms/FormInputEmail.vue";
import FormInputDate from "@/Components/Shared/Forms/FormInputDate.vue";
import CloseButton from "@/Components/Shared/Buttons/CloseButton.vue";
import SaveButton from "@/Components/Shared/Buttons/SaveButton.vue";

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
    <PageHead icon="fa-solid fa-pen-to-square"
              :title="`Edit ${client.firstname + ' ' + client.lastname} Details`"></PageHead>
    <form @submit.prevent="form.put(`/clients/${client.id}`)" class="row g-3">

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
                <FormInputText :form id="phone_number" title="Phone Number" v-model="form.phone_number"></FormInputText>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6 d-flex">
                <SaveButton :form text="Save" class="flex-grow-1 me-2"></SaveButton>
                <CloseButton :url="`/clients/${props.client.id}`" class="flex-grow-1"></CloseButton>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
