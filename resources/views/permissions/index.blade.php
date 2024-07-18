@extends('mainLayout')

@section('page-title', 'Manage Permissions')

@section('page-content')
<div class="container mt-4">
    <h1>Permissions</h1>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Back to Home</a>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Add Permission</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
