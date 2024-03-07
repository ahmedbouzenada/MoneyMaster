@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create New Client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="firstname" class="font-weight-bold">First Name</label>
                                <input type="text" name="firstname"
                                       class="form-control @error('firstname') is-invalid @enderror" required>
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="font-weight-bold">Last Name</label>
                                <input type="text" name="lastname"
                                       class="form-control @error('lastname') is-invalid @enderror" required>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="font-weight-bold">Phone Number</label>
                                <input type="text" name="phone_number"
                                       class="form-control @error('phone_number') is-invalid @enderror" required>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
