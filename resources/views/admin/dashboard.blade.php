@extends('mainLayout')

@section('page-content')
<div class="container mt-4 p-4 border rounded">
    <div class="text-center mb-4">
        <div class="quote-text">People find pleasure in different ways. I find it in keeping my mind clear.</div>
        <footer class="blockquote-footer mt-2">Marcus Aurelius</footer>
    </div>
    <div class="text-center">
        <p>
            <a href="{{ route('usertool') }}" class="btn btn-success">Manage User Roles and Permissions</a>
        </p>
        <p>
            <a href="{{ route('home') }}">Back</a>
        </p>
    </div>
</div>
@endsection
