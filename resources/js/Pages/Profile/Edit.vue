<script setup>
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile"/>
    <PageHead title="Profile" icon="fa-solid fa-user"></PageHead>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
                class="mx-auto"
            />
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <UpdatePasswordForm class="mx-auto"/>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <DeleteUserForm class="mx-auto"/>
        </div>
    </div>

</template>
