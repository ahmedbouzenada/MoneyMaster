<script setup>
import DangerButton from "@/Components/Shared/Buttons/DangerButton.vue";
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import PageHead from "@/Components/Shared/PageHead.vue";
import CloseButton from "@/Components/Shared/Buttons/Links/CloseButton.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";

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
    <PageHead title="Delete Account" icon="fa-solid fa-user-minus"></PageHead>

    <p class="mt-1 text-sm text-gray-600">
        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
        your account, please download any data or information that you wish to retain.
    </p>

    <DangerButton @click="confirmUserDeletion" label="Delete Account"></DangerButton>

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
                <CloseButton @click="closeModal" preserve-scroll class="me-2"></CloseButton>
                <SubmitButton
                    :form
                    label="Delete Account"
                    icon="fa-solid fa-trash"
                    btn-style="btn btn-danger"
                    @click="deleteUser"
                ></SubmitButton>

            </div>
        </div>
    </div>


</template>
