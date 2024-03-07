@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron bg-light shadow-sm rounded">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 text-primary">Welcome to DebtTracker</h1>
                    <p class="lead">Effortlessly Manage Your Finances</p>
                    <hr class="my-4">
                    <p class="text-muted">DebtTracker is a powerful and intuitive application designed to streamline
                        your financial management. With its user-friendly interface and robust features, you can easily
                        keep track of your debts, payments, and overall financial health.</p>
                    <p class="text-muted">Take control of your finances today and experience the benefits of seamless
                        financial organization.</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('clients.index') }}" role="button">Get Started</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/finance-illustration.jpeg') }}" alt="Finance Illustration"
                         class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Client Management</h5>
                        <p class="card-text text-muted">Effortlessly manage your clients and their contact information,
                            ensuring seamless communication and organization.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Debt and Payment Tracking</h5>
                        <p class="card-text text-muted">Stay on top of your financial obligations with our intuitive
                            debt and payment tracking system, ensuring timely payments and accurate records.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Insightful Reporting</h5>
                        <p class="card-text text-muted">Gain valuable insights into your financial health with our
                            comprehensive reporting and analytics tools, empowering you to make informed decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
