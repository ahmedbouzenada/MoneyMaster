@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Clients</h2>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i>Create Client
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
                                <td>{{ $client->balance().' DZD' }}</td>
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
            </div>
        </div>
    </div>
@endsection
