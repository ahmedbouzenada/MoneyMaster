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
    <form class="d-flex">
        <div class="input-group">
        <span class="input-group-text bg-white border-end-0">
            <i class="fas fa-search"></i>
        </span>
            <input
                type="text"
                placeholder="Search..."
                v-model="search"
                class="form-control border-start-0 rounded-end"
            />
        </div>
    </form>
</template>
