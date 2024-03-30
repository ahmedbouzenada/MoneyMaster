<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in"/>
    <div class="mb-4 alert alert-success" role="alert" v-if="status">
        {{ status }}
    </div>
    <form @submit.prevent="submit" class="mb-4">
        <div class="mb-3">
            <FormInputText
                :form
                id="email"
                title="Email"
                v-model="form.email"
            ></FormInputText>
        </div>

        <div class="mb-3">
            <FormInputPassword
                :form
                id="password"
                title="Password"
                v-model="form.password"
            ></FormInputPassword>
        </div>

        <div class="mb-3 d-flex justify-content-between">
            <div class="form-check">
                <Checkbox name="remember" v-model:checked="form.remember"/>
                <span class="form-check-label">Remember me</span>
            </div>

            <div v-if="canResetPassword">
                <Link
                    :href="route('password.request')"
                    class="text-decoration-underline text-muted hover-link"
                >
                    Forgot your password?
                </Link>
            </div>
        </div>

        <div>
            <PrimaryButton
                class="d-block mx-auto w-100"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Log in
            </PrimaryButton>
        </div>
    </form>
</template>
