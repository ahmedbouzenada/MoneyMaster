@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Debt #{{ $debt->reference_number }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('debts.update', $debt) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Hidden input for client_id -->
                            <input type="hidden" name="client_id" value="{{ $debt->client->id }}">
                            <div class="form-group">
                                <label for="client" class="font-weight-bold">Client</label>
                                <input type="text" class="form-control" id="client"
                                       value="{{ $debt->client->firstname }} {{ $debt->client->lastname }}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="font-weight-bold">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" name="amount" class="form-control" id="amount"
                                           value="{{ $debt->amount }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Description</label>
                                <textarea name="description" class="form-control" id="description"
                                          rows="3">{{ $debt->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" class="font-weight-bold">Date</label>
                                <input type="datetime-local" name="date" class="form-control" id="date"
                                       value="{{ \Illuminate\Support\Carbon::parse($debt->date)->format('Y-m-d\TH:i') }}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Update
                                </button>
                                <a href="{{ route('clients.show',$debt->client) }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
