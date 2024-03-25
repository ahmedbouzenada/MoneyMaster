<script setup>
import {Link} from '@inertiajs/vue3';
</script>

<template>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <Link class="navbar-brand" href="/">
                    <i class="fas fa-money-check-alt mr-2"></i>MoneyMaster
                </Link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <Link class="nav-link" href="/clients">
                                <i class="fas fa-users mr-2"></i>Clients
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/payments">
                                <i class="fas fa-money-bill-wave mr-2"></i>Payments
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/debts">
                                <i class="fas fa-landmark mr-2"></i>Debts
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            <slot/>
        </div>
        <footer class="footer mt-auto py-3 bg-dark text-white">
            <div class="container text-center">
                <span>MoneyMaster &copy; {{ new Date().getFullYear() }}</span>
            </div>
        </footer>
    </div>
</template>

<style>


</style>
