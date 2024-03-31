<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import ConfirmButton from "@/Components/Shared/Buttons/ConfirmButton.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirm Password"/>

    <div class="mb-4 text-sm text-gray-600">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <form @submit.prevent="submit">
        <div>
            <FormInputPassword
                :form
                id="password"
                title="Password"
                v-model="form.password"
            ></FormInputPassword>
        </div>

        <div class="flex justify-end mt-4">
            <ConfirmButton
                :form
                text="Confirm"
            ></ConfirmButton>
        </div>
    </form>
</template>
