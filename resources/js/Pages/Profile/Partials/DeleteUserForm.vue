<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";

const confirmingUserDeletion = ref(false);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.reset();
};
</script>

<template>

    <h2 class="text-lg font-medium text-gray-900">Delete Account</h2>

    <p class="mt-1 text-sm text-gray-600">
        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
        your account, please download any data or information that you wish to retain.
    </p>

    <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>

    <div class="modal-dialog mt-4" v-if="confirmingUserDeletion">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete your account?</h5>
            </div>
            <div class="modal-body">
                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter
                    your password to confirm you would like to permanently delete your account.</p>

                <div class="mb-3">
                    <FormInputPassword
                        :form
                        id="password"
                        title="Password"
                        v-model="form.password"
                    ></FormInputPassword>
                </div>
            </div>
            <div class="modal-footer">
                <SecondaryButton @click="closeModal" class="me-2">Cancel</SecondaryButton>

                <DangerButton
                    :disabled="form.processing"
                    @click="deleteUser"
                >
                    Delete Account
                </DangerButton>
            </div>
        </div>
    </div>


</template>
