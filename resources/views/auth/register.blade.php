@extends('mainLayout')

@section('page-title','Account Registration')

@section('auth-content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center py-1 mb-2 text-white rounded" style="background-color: green; color: white;">
            <span style="font-size: 1.3em">Register User</span>
        <div class="col-sm-3"></div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="border:1px solid grey; padding: 20px;">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required class="form-control">
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required class="form-control">
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <div class="form-check">
                        <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input">
                        <label for="generate_email" class="form-check-label">Generate Email Address</label>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" required class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Register</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="{{ route('home') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Return to Landing Page</a>
    </div>
</div>
@endsection
