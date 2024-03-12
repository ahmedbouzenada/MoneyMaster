@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-users mr-2"></i>Clients</h2>
            <div class="d-flex">
                <form action="{{ route('clients.index') }}" method="GET" class="mr-3">
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
                <a href="{{ route('clients.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-2"></i>Create Client
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>
                                <a href="{{ route('clients.index', ['sort' => 'firstname', 'order' => request()->input('order') === 'asc' ? 'desc' : 'asc']) }}">
                                    Name
                                    @if(request()->input('sort') === 'firstname')
                                        <i class="fas fa-sort-{{ request()->input('order') === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('clients.index', ['sort' => 'email', 'order' => request()->input('order') === 'asc' ? 'desc' : 'asc']) }}">
                                    Email
                                    @if(request()->input('sort') === 'email')
                                        <i class="fas fa-sort-{{ request()->input('order') === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Phone Number</th>
                            <th>Balance</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone_number }}</td>
                                <td class="@if($client->balance >= 0) positive-balance @else negative-balance @endif">{{ 'DZD ' . number_format($client->balance, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm"
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this client?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No clients found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $clients->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
