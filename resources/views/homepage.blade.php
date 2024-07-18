@extends('mainLayout')

@section('page-title','Main Landing Page')

@section('page-content')
<div class="container mt-4 p-4 border rounded text-center">
    <h1>Welcome to the Site</h1>
    <br>
    <div class="mb-3">
        <a href="{{ route('acctg') }}"
            @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('bookeeper') || Auth::user()->hasRole('auditor') || Auth::user()->hasRole('audasst'))
                class="link-dark not-allowed" style="pointer-events: none; cursor: not-allowed;"
            @endunless
        >Accounting</a>
    </div>
    <div class="mb-3">
        <a href="{{ route('prod') }}"
            @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('assembler'))
                class="link-dark not-allowed" style="pointer-events: none; cursor: not-allowed;"
            @endunless
        >Production</a>
    </div>
    @if(Auth::user()->hasRole('admin'))
       <div class="mb-3">
           <a href="{{ route('dash') }}">Dashboard</a>
       </div>
       <div class="mb-3">
           <a href="{{ route('roles.index') }}">Manage Roles</a>
       </div>
       <div class="mb-3">
           <a href="{{ route('permissions.index') }}">Manage Permissions</a>
       </div>
    @endif
</div>
@endsection
