<script setup>
import Navigation from "@/Shared/Navigation.vue";
</script>

<template>
    <div class="d-flex flex-column min-vh-100">
        <header>
            <Navigation></Navigation>
        </header>
        <main class="container mt-5 pt-5">
            <slot/>
        </main>
        <footer class="footer mt-auto py-3 bg-dark text-white">
            <div class="container text-center">
                <span>MoneyMaster &copy; {{ new Date().getFullYear() }}</span>
            </div>
        </footer>
    </div>
</template>

<style>
</style>
