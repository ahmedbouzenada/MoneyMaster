<script setup>
import {Head, Link} from "@inertiajs/vue3";
</script>

<template>
    <Head title="Home"></Head>
    <div class="container">
        <div class="p-5 bg-light rounded-3 shadow-sm">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-4 text-primary">Welcome to MoneyMaster</h1>
                    <p class="lead">Effortlessly Manage Your Finances</p>
                    <hr class="my-4">
                    <p class="text-muted">MoneyMaster is a powerful and intuitive application designed to streamline
                        your financial management. With its user-friendly interface and robust features, you can easily
                        keep track of your debts, payments, and overall financial health.</p>
                    <p class="text-muted">Take control of your finances today and experience the benefits of seamless
                        financial organization.</p>
                    <Link class="btn btn-primary btn-lg" href="/dashboard">Get Started</Link>
                </div>
                <div class="col">
                    <img :src="`/images/logo.jpeg`" alt="Finance Illustration" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</template>
