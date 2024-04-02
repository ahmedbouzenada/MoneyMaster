<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

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
  <PageHead title="Reset Password" icon="fa-solid fa-lock-open"></PageHead>
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
          <SubmitButton
                :form
                label="Reset Password"
                icon="fa-solid fa-gear"
          ></SubmitButton>
        </div>
    </form>
</template>
