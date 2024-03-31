<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <Link
        href="/logout"
        method="post"
        as="button"
        class="btn btn-secondary "
    ><i class="fa-solid fa-power-off me-2"></i>Log Out
    </Link
    >
</template>

<style scoped>

</style>
