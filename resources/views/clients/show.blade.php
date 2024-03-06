<!-- resources/views/clients/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Client Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $client->firstname }} {{ $client->lastname }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
                <p class="card-text"><strong>Phone Number:</strong> {{ $client->phone_number ?: 'N/A' }}</p>
                <!-- Add more client details as needed -->
            </div>
        </div>
    </div>
@endsection
