<script setup>
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    route: {
        type: String,
        required: true,
    },
});

let search = ref('')
watch(
    search, (value) => {
        router.get(props.route, {search: value,},
            {
                replace: true,
                preserveState: true,
            }
        )
    }
);
</script>

<template>
    <input
        type="text"
        placeholder="Search..."
        v-model="search"
        class="form-control"
    />
</template>
