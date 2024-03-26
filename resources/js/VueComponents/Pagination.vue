<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({links: Object})
</script>

<template>
    <div>
        <nav>
            <ul class="pagination justify-content-end">
                <li v-for="(link, p) in links" :key="p" class="page-item"
                    :class="{ disabled: link.url === null, active: link.active }">
                    <a v-if="link.url === null" class="page-link" v-html="link.label" aria-disabled="true"></a>
                    <Link v-else class="page-link" :href="link.url" v-html="link.label" preserve-scroll
                          preserve-state></Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
