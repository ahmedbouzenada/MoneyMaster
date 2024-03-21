@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-lg rounded-circle bg-primary text-white mr-3">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="card-title mb-0">{{ $client->firstname }} {{ $client->lastname }}</h4>
                                <p class="text-muted mb-0">Client Details</p>
                            </div>
                        </div>
                        <p class="card-text"><i class="fas fa-envelope mr-2"></i> {{ $client->email }}</p>
                        <p class="card-text"><i class="fas fa-phone mr-2"></i> {{ $client->phone_number ?: 'N/A' }}</p>
                        <p class="card-text"><i class="fas fa-calendar mr-2"></i> {{ $client->birthdate ?: 'N/A' }}</p>
                        <p class="card-text @if($client->balance >= 0) positive-balance @else negative-balance @endif">
                            <i class="fas fa-balance-scale mr-2"></i> {{ number_format($client->balance, 2, ',', '.').' DZD' ?: 'N/A' }}
                        </p>
                        <!-- Add more client details as needed -->
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Payments</h5>
                        <a href="{{ route('payments.create', ['client_id' => $client->id]) }}"
                           class="btn btn-light btn-sm">
                            <i class="fas fa-plus mr-2"></i>Create Payment
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($client->payments->count() > 0)
                            <div class="list-group">
                                @foreach ($client->payments as $payment)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1"><strong>Reference
                                                        Number:</strong> {{ $payment->reference_number }}</p>
                                                <p class="mb-1"><strong>Amount:</strong> {{ $payment->amount }}</p>
                                                <p class="mb-0"><strong>Date:</strong> {{ $payment->date }}</p>
                                            </div>
                                            <div class="ml-3">
                                                <a href="{{route('payments.edit',$payment->id)}}"
                                                   class="btn btn-primary btn-sm"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('payments.destroy', $payment->id) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this payment?')">
                                                        <i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-muted">No payments found.</p>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-end positive-balance">
                        <strong>Total: {{ $client->payments()->sum('amount') }} DZD</strong>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Debts</h5>
                        <a href="{{ route('debts.create', ['client_id' => $client->id]) }}"
                           class="btn btn-light btn-sm">
                            <i class="fas fa-plus mr-2"></i>Create Debt
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($client->debts->count() > 0)
                            <div class="list-group">
                                @foreach ($client->debts as $debt)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1"><strong>Reference
                                                        Number:</strong> {{ $debt->reference_number }}</p>
                                                <p class="mb-1"><strong>Amount:</strong> {{ $debt->amount }}</p>
                                                <p class="mb-0"><strong>Date:</strong> {{ $debt->date }}</p>
                                            </div>
                                            <div class="ml-3">
                                                <a href="{{route('debts.edit',$debt->id)}}"
                                                   class="btn btn-primary btn-sm"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('debts.destroy', $debt->id) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this debt?')">
                                                        <i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-muted">No debts found.</p>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-end negative-balance">
                        <strong>Total: {{ -$client->debts()->sum('amount') }} DZD</strong>
                    </div>
                </div>
                <div class="text-left my-4"><a href="{{ route('clients.index') }}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
