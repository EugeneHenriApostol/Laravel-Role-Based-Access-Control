@extends('mainLayout')

@section('page-content')
<div class="container mt-4 p-4 border rounded">
    <div class="text-center mb-4">
        <div class="quote-text">Simplicity is the ultimate sophistication.</div>
        <footer class="blockquote-footer mt-2">Leonardo da Vinci</footer>
    </div>
    <div class="text-center my-4">
        @can('create')
            <a href="{{ url('acctg/new') }}" class="btn btn-success                                                                                                                         ">Add New Ledger Entry</a>
        @elsecan('viewAll')
            <a href="{{ url('acctg/view/all') }}" class="btn btn-secondary">View All Ledgers</a>
        @endcan
    </div>
    <div class="text-center">
        @include('slugs.homeLink')
    </div>
</div>
@endsection
