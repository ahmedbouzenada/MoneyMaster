<script setup>
import {useForm, usePage} from '@inertiajs/vue3';
import SaveButton from "@/Components/Shared/Buttons/SaveButton.vue";
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputEmail from "@/Components/Shared/Forms/FormInputEmail.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
    <p class="mt-1 text-sm text-gray-600">
        Update your account's profile information and email address.
    </p>


    <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
        <div class="row g-3">
            <div>
                <FormInputText
                    :form
                    id="name"
                    title="Name"
                    v-model="form.name"
                ></FormInputText>
            </div>

            <div>
                <FormInputEmail
                    :form
                    id="email"
                    title="Email"
                    v-model="form.email"
                ></FormInputEmail>
            </div>

            <SaveButton
                :form
                text="Save"
            ></SaveButton>

            <div v-if="form.recentlySuccessful" class="alert alert-success d-flex align-items-center mb-0"
                 role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <span>Saved.</span>
            </div>
        </div>
    </form>

</template>
