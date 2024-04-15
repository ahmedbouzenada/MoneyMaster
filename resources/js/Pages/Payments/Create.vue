<script setup>

import {Head, useForm} from "@inertiajs/vue3";
import PageHead from "@/Components/Shared/PageHead.vue";
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputNumber from "@/Components/Shared/Forms/FormInputNumber.vue";
import FormInputDateTime from "@/Components/Shared/Forms/FormInputDateTime.vue";
import FormInputSelect from "@/Components/Shared/Forms/FormInputSelect.vue";
import CloseButton from "@/Components/Shared/Buttons/Links/CloseButton.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";

let props = defineProps({
    client: Object
});

let form = useForm({
    amount: 0,
    description: '',
    date: new Date().toISOString().substring(0, 16),
    client_id: props.client.id,
    payment_method: '',

});
</script>

<template>
    <Head title="New Payment"></Head>
    <PageHead icon="fa-solid fa-square-plus" :title="`New Payment for ${client.name}`"></PageHead>
    <form @submit.prevent="form.post('/payments')">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputNumber
                        :form
                        id="amount"
                        title="Amount"
                        v-model="form.amount"
                    ></FormInputNumber>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputText
                        :form
                        id="description"
                        title="Description"
                        v-model="form.description"
                    ></FormInputText>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputDateTime
                        :form
                        id="date"
                        title="Date"
                        v-model="form.date"
                    ></FormInputDateTime>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <FormInputSelect
                        :form
                        id="payment_method"
                        title="Payment Method"
                        v-model="form.payment_method"
                        message="Select a payment method"
                        :options="[
                            { value: 'cash', text: 'Cash' },
                            { value: 'bank_transfer', text: 'Bank Transfer' },
                            { value: 'credit_card', text: 'Credit Card' },
                            ]"
                    ></FormInputSelect>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 d-flex">
                <SubmitButton :form label="Save" icon="fa-solid fa-floppy-disk"
                              class="flex-grow-1 me-2"></SubmitButton>
                <CloseButton :url="`/clients/${client.id}`" class="flex-grow-1"></CloseButton>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
