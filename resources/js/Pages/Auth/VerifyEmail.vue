<script setup>
import {computed} from 'vue';
import {Head, useForm} from '@inertiajs/vue3';
import ConfirmButton from "@/Components/Shared/Buttons/ConfirmButton.vue";
import LogOutButton from "@/Components/Shared/Buttons/LogOutButton.vue";

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification"/>

    <div class="mb-4 text-sm text-gray-600">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
        we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>

    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
        A new verification link has been sent to the email address you provided during registration.
    </div>

    <form @submit.prevent="submit">
        <div class="mt-4 flex items-center justify-between">
            <ConfirmButton
                :form
                text="Resend Verification Email"
                icon="fa-solid fa-envelope-circle-check"
                class="me-2"
            ></ConfirmButton>
            <LogOutButton></LogOutButton>
        </div>
    </form>
</template>
