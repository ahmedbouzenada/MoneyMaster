<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password"/>
    <PageHead title="Forgot Password" icon="fa-solid fa-key"></PageHead>
    <div class="mb-4 text-sm text-gray-600">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset
        link that will allow you to choose a new one.
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <FormInputText
                :form
                id="email"
                title="Email"
                v-model="form.email"
            ></FormInputText>
        </div>

        <div class="flex items-center justify-end mt-4">
            <SubmitButton
                :form
                text="Email Password Reset Link"
                icon="fa-solid fa-envelope"
            ></SubmitButton>
        </div>
    </form>
</template>
