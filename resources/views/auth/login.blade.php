@extends('mainLayout')

@section('page-title','Account Login')

@section('auth-content')
<div class="container vh-100">
    <div class="row mt-5">
        <div class="col-4"></div>
        <div class="col-4 text-center py-1 mb-2 text-white rounded" style="background-color: green; color: white;">
            <span style="font-size: 1.3em">User Login</span>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4" style="border: 1px solid grey; padding: 20px; border-radius: 10px;">
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control border border-dark">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" required class="form-control border border-dark">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Login</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
                <div class="text-center mt-3">
                    Not a user? Register <a href="{{ route('register') }}">Here</a>.
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection
