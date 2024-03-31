<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import ConfirmButton from "@/Components/Shared/Buttons/ConfirmButton.vue";

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password"/>

    <form @submit.prevent="submit">
        <div>
            <FormInputText
                :form
                id="email"
                title="email"
                v-model="form.email"
            ></FormInputText>
        </div>

        <div class="mt-4">
            <FormInputPassword
                :form
                id="password"
                title="Password"
                v-model="form.password"
            ></FormInputPassword>
        </div>

        <div class="mt-4">

            <FormInputPassword
                :form
                id="password_confirmation"
                title="Confirm Password"
                v-model="form.password_confirmation"
            ></FormInputPassword>
        </div>
        <div class="flex items-center justify-end mt-4">
            <ConfirmButton
                :form
                text="Reset Password"
                icon="fa-solid fa-gear"
            ></ConfirmButton>
        </div>
    </form>
</template>
