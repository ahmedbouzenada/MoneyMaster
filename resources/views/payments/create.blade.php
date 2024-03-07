@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create Payment for {{ $client->firstname }} {{ $client->lastname }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <!-- Hidden input for client_id -->
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <div class="form-group">
                                <label for="amount" class="font-weight-bold">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" name="amount" class="form-control" id="amount" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Date</label>
                                <input type="datetime-local" name="date" class="form-control" id="date"
                                       value="{{\Illuminate\Support\Carbon::now()}}">
                            </div>
                            <div class="form-group">
                                <label for="payment_method" class="font-weight-bold">Payment Method</label>
                                <select name="payment_method" class="form-control" id="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create
                                </button>
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
