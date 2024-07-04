@extends('mainLayout')

@section('title', 'Edit User')

@section('page-content')
<div class="container">
    <div class="text-center mb-4">
        <h2>Edit User</h2>
    </div>

    
    <form action="{{ route('updateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->userInfo->user_firstname }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->userInfo->user_lastname }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
            <div class="col-sm-10">
                <select name="roles[]" id="roles" class="form-select" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success">Update User</button>
                <a href="{{ route('usertool') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
