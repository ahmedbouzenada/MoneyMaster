<script setup>
import {ref} from "vue";

const emit = defineEmits(["confirm", "cancel"]);

const showModal = ref(false);
const confirmAction = () => {
    emit("confirm");
    showModal.value = false;
};
const cancelAction = () => {
    emit("cancel");
    showModal.value = false;
};
const openModal = () => {
    showModal.value = true;
};

defineExpose({
    openModal,
});
defineProps({
    item: {
        type: String,
        default: "item"
    },
})
</script>

<template>
    <div
        class="modal fade"
        :class="{ show: showModal, 'd-block': showModal }"
        tabindex="-1"
        role="dialog"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-dismiss="modal"
                        aria-label="Close"
                        @click="cancelAction"
                    >
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this {{ item }}?</p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        @click="cancelAction"
                    >
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger" @click="confirmAction">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
