@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-money-bill-wave mr-2"></i>Payments</h2>
            <div class="d-flex">
                <form action="{{ route('payments.index') }}" method="GET" class="mr-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search..."
                               value="{{ request()->input('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>Client</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{ $payment->client->firstname }} {{ $payment->client->lastname }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->date }}</td>
                                <td class="text-center">
                                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm"
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this payment?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No payments found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{$payments->withQueryString()->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection
