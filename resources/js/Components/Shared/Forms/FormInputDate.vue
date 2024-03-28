<script setup>
import {computed} from "vue";

let props = defineProps({
    form: Object,
    id: String,
    title: String,
    modelValue: String
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
    <label :for="id" class="form-label">{{ title }}</label>
    <input
        type="date"
        class="form-control"
        v-model="model"
        :id="id"
        :name="id"
        :class="{ 'is-invalid': form.errors[id] }"
    >
    <div v-if="form.errors[id]" class="invalid-feedback">{{ form.errors[id] }}</div>
</template>

<style scoped>

</style>
