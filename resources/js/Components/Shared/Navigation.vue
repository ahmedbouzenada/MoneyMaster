<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage()

const user = computed(() => page.props.auth.user)
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <Link class="navbar-brand d-flex align-items-center" href="/">
                <i class="fas fa-money-check-alt fa-2x me-2"></i>
                <span class="fw-bold">MoneyMaster</span>
            </Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" v-if="!user">
                <li class="nav-item">

                    <Link class="nav-link" href="/login" :class="{ 'active': $page.url === '/login' }">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/register" :class="{ 'active': $page.url === '/register' }">
                        <i class="fas fa-user-plus me-2"></i>Register
                    </Link>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="user">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link" href="/dashboard" :class="{ 'active': $page.url === '/dashboard' }">
                            <i class="fas fa-gauge-high me-2"></i>Dashboard
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/clients" :class="{ 'active': $page.url.startsWith('/clients') }">
                            <i class="fas fa-users me-2"></i>Clients
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/payments"
                              :class="{ 'active': $page.url.startsWith('/payments') }">
                            <i class="fas fa-money-bill-wave me-2"></i>Payments
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/debts" :class="{ 'active': $page.url.startsWith('/debts') }">
                            <i class="fa-solid fa-hand-holding-dollar me-2"></i>Debts
                        </Link>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>{{ user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <Link class="dropdown-item" href="/profile"><i class="fas fa-user-circle me-2"></i>Profile
                                </Link>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <Link class="dropdown-item" href="/logout" method="post" as="button"><i
                                    class="fas fa-sign-out-alt me-2"></i>Logout
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
