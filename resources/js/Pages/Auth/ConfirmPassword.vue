<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import PageHead from "@/Components/Shared/PageHead.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";

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
  <PageHead title="Confirm Password" icon="fa-solid fa-key"></PageHead>
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
          <SubmitButton
                :form
                label="Confirm"
          ></SubmitButton>
        </div>
    </form>
</template>
