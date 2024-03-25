<template>
    <form @submit.prevent="search">
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                placeholder="Search..."
                v-model="searchTerm"
            />
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            searchTerm: '',
        };
    },
    methods: {
        search() {
            console.log('Search term:', this.searchTerm);
        },
    },
};
</script>
