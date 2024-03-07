@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Payment #{{ $payment->reference_number }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payments.update', $payment) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Hidden input for client_id -->
                            <input type="hidden" name="client_id" value="{{ $payment->client->id }}">
                            <div class="form-group">
                                <label for="client" class="font-weight-bold">Client</label>
                                <input type="text" class="form-control" id="client"
                                       value="{{ $payment->client->firstname }} {{ $payment->client->lastname }}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="font-weight-bold">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" name="amount" class="form-control" id="amount"
                                           value="{{ $payment->amount }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Description</label>
                                <textarea name="description" class="form-control" id="description"
                                          rows="3">{{ $payment->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Date</label>
                                <input type="datetime-local" name="date" class="form-control" id="date"
                                       value="{{ \Illuminate\Support\Carbon::parse($payment->date)->format('Y-m-d\TH:i') }}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="payment_method" class="font-weight-bold">Payment Method</label>
                                <select name="payment_method" class="form-control" id="payment_method">
                                    <option value="cash" {{ $payment->payment_method === 'Cash' ? 'selected' : '' }}>
                                        Cash
                                    </option>
                                    <option
                                        value="credit_card" {{ $payment->payment_method === 'Credit Card' ? 'selected' : '' }}>
                                        Credit Card
                                    </option>
                                    <option
                                        value="bank_transfer" {{ $payment->payment_method === 'Bank Transfer' ? 'selected' : '' }}>
                                        Bank Transfer
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Update
                                </button>
                                <a href="{{ route('clients.show',$payment->client) }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
