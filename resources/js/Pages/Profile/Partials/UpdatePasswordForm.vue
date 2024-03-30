<script setup>
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import SaveButton from "@/Components/Shared/Buttons/SaveButton.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
    <p class="mt-1 text-sm text-gray-600">
        Ensure your account is using a long, random password to stay secure.
    </p>


    <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
        <div class="row g-3">
            <div>
                <FormInputPassword
                    :form
                    id="current_password"
                    title="Current Password"
                    v-model="form.current_password"
                ></FormInputPassword>
            </div>

            <div>
                <FormInputPassword
                    :form
                    id="password"
                    title="New Password"
                    v-model="form.password"
                ></FormInputPassword>
            </div>

            <div>
                <FormInputPassword
                    :form
                    id="password_confirmation"
                    title="Confirm Password"
                    v-model="form.password_confirmation"
                ></FormInputPassword>
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
