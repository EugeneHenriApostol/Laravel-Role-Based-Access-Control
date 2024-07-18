@extends('mainLayout')

@section('page-title', 'Edit Permission')

@section('page-content')
<div class="container mt-4">
    <h1>Edit Permission</h1>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Back to Home</a>
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
