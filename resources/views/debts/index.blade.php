@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-landmark mr-2"></i>Debts</h2>
            <div class="d-flex">
                <form action="{{ route('debts.index') }}" method="GET" class="mr-3">
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
                            <th>
                                <a href="{{ route('debts.index', ['sort' => 'amount', 'order' => request()->input('order') === 'asc' ? 'desc' : 'asc']) }}">
                                    Amount
                                    @if(request()->input('sort') === 'amount')
                                        <i class="fas fa-sort-{{ request()->input('order') === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('debts.index', ['sort' => 'date', 'order' => request()->input('order') === 'asc' ? 'desc' : 'asc']) }}">
                                    Date
                                    @if(request()->input('sort') === 'date')
                                        <i class="fas fa-sort-{{ request()->input('order') === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($debts as $debt)
                            <tr>
                                <td>{{ $debt->client->firstname }} {{ $debt->client->lastname }}</td>
                                <td>{{ $debt->amount }}</td>
                                <td>{{ $debt->date }}</td>
                                <td class="text-center">
                                    <a href="{{ route('debts.show', $debt->id) }}" class="btn btn-info btn-sm"
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('debts.edit', $debt->id) }}" class="btn btn-primary btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('debts.destroy', $debt->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this debt?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No debts found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{$debts->withQueryString()->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection
