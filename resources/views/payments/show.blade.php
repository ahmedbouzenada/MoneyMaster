@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Payment Details</h4>
                        <div>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id]) }}"
                               class="btn btn-light btn-sm">
                                <i class="fas fa-edit mr-2"></i>Edit Payment
                            </a>
                            <!-- Add delete button if applicable -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Client:</strong></p>
                                <p class="border rounded p-2">{{ $payment->client->firstname }} {{ $payment->client->lastname }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Reference Number:</strong></p>
                                <p class="border rounded p-2">{{ $payment->reference_number }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Amount:</strong></p>
                                <p class="border rounded p-2">{{ $payment->amount }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date:</strong></p>
                                <p class="border rounded p-2">{{ $payment->date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Payment Method:</strong></p>
                                <p class="border rounded p-2">{{ $payment->payment_method }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Description:</strong></p>
                                <p class="border rounded p-2">{{ $payment->description ?: 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-left mt-2"><a href="{{ route('clients.show',$payment->client) }}"
                                               class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
