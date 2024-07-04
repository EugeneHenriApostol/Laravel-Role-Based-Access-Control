@extends('mainLayout')

@section('title', 'Manage Users')

@section('page-content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col">
            <div class="bg-secondary text-white fs-5 p-2 text-start text-center">
                USER MANAGEMENT
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="table-secondary">
                    <tr class="text-center">
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody class="fs-6">
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('editUser', $user->id) }}" title="Manage Selected User" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('removeUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z"/>
                                </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <a href="{{ route('dash') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
</div>
@endsection
