<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({links: Object})
</script>

<template>
    <div>
        <nav aria-label="Pagination">
            <ul class="pagination justify-content-end">
                <li v-for="(link, p) in links" :key="p" class="page-item"
                    :class="{ 'disabled': link.url === null, 'active': link.active }">
                    <span v-if="link.url === null" class="page-link" aria-disabled="true" v-html="link.label"></span>
                    <Link v-else class="page-link" :href="link.url" v-html="link.label" preserve-scroll
                          preserve-state></Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
