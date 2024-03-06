<!-- resources/views/clients/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Clients</h2>
        <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Create Client</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this client?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
