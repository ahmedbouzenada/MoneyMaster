<script setup>
</script>

<template>
    <form @submit.prevent="search">
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                placeholder="Search..."
            />
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
</template>
