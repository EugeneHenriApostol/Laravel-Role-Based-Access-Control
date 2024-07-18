@extends('mainLayout')

@section('page-title', 'Create Role')

@section('page-content')
<div class="container mt-4">
    <h1>Create Role</h1>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Back to Home</a>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
