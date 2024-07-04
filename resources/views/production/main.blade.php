@extends('mainLayout')

@section('page-content')
<div class="container mt-4 p-4 border rounded">
    <div class="text-center mb-4">
        <div class="quote-text">You must be the change you wish to see in the world.</div>
        <footer class="blockquote-footer mt-2">Mahatma Gandhi</footer>
    </div>
    <div class="text-center">
        @include('slugs.homeLink')
    </div>
</div>
@endsection
