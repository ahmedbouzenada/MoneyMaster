<script setup>
import {computed} from "vue";

let props = defineProps({
    form: Object,
    id: String,
    title: String,
    modelValue: Boolean
})
const emit = defineEmits(['update:modelValue'])
const model = computed({
    get() {
        return props.modelValue
    },
    set(value) {
        emit('update:modelValue', value)
    },
});

</script>

<template>
    <div class="form-check">

        <input
            type="checkbox"
            class="form-check-input"
            v-model="model"
            :id="id"
            :name="id"
            :class="{ 'is-invalid': form.errors[id] }"
        >
        <label :for="id" class="form-check-label">{{ title }}</label>
    </div>
    <div v-if="form.errors[id]" class="invalid-feedback">{{ form.errors[id] }}</div>
</template>

<style scoped>

</style>
