<script setup>
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import {debounce} from "lodash";

const props = defineProps({
    route: {
        type: String,
        required: true,
    },
});

let search = ref('')
watch(
    search, debounce(
        (value) => {
            router.get(props.route, {search: value,},
                {
                    replace: true,
                    preserveState: true,
                }
            )
        }, 500
    )
);
</script>

<template>
    <form>
        <input
            type="text"
            placeholder="Search..."
            v-model="search"
            class="form-control"
        />
    </form>
</template>
