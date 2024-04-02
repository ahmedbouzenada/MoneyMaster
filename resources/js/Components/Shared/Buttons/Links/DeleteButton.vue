<script setup>
import ConfirmationModal from "@/Components/Shared/ConfirmationModal.vue";
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    url: String,
    text: {
        type: String,
        default: "",
    },
    item: String
});

const confirmationModal = ref(null);

const confirmDelete = () => {
    router.delete(props.url)
};
</script>

<template>

    <button
        class="btn btn-sm btn-danger"
        @click="confirmationModal.openModal()"
    >
        <i class="fas fa-trash-alt" :class="{ 'me-2': text }"></i>
        {{ text }}
    </button>

    <ConfirmationModal
        ref="confirmationModal"
        @confirm="confirmDelete"
        :item="item"
    />

</template>
