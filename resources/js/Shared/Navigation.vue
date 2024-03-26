<script setup>

</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <Link class="navbar-brand" href="/">
                <i class="fas fa-money-check-alt me-2"></i>MoneyMaster
            </Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <Link class="nav-link" href="/clients"
                              :class="{ 'active': $page.url.startsWith('/clients') }">
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
                            <i class="fas fa-landmark me-2"></i>Debts
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/"
                              :class="{ 'active': $page.url==='/' }">
                            <i class="fa-solid fa-house"></i>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
