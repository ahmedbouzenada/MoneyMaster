@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Debt Details</h4>
                        <div>
                            <a href="{{ route('debts.edit', ['debt' => $debt->id]) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-edit mr-2"></i>Edit debt
                            </a>
                            <!-- Add delete button if applicable -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Reference Number:</strong></p>
                                <p class="border rounded p-2">{{ $debt->reference_number }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Amount:</strong></p>
                                <p class="border rounded p-2">{{ $debt->amount }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Description:</strong></p>
                                <p class="border rounded p-2">{{ $debt->description ?: 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date:</strong></p>
                                <p class="border rounded p-2">{{ $debt->date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-left mt-2"><a href="{{ route('clients.show',$debt->client) }}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection