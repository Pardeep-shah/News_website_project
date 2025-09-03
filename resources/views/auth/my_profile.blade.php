@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2>My Profile</h2>

    {{-- Success / Error Messages --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card p-4 shadow-sm">
        <div class="mb-3">
            <strong>First Name:</strong> {{ Auth::user()->first_name }}
        </div>
        <div class="mb-3">
            <strong>Last Name:</strong> {{ Auth::user()->last_name }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ Auth::user()->email }}
        </div>
        <div class="mb-3">
            <strong>Country:</strong> {{ Auth::user()->country?->country_name }}
        </div>

        {{-- Extra Country Info --}}
        @if(Auth::user()->country)
        <hr>
        <h5>Country Details</h5>
        <div class="mb-2"><strong>Country Code:</strong> {{ Auth::user()->country->country_code }}</div>
        <div class="mb-2"><strong>Telephone Code:</strong> {{ Auth::user()->country->country_tel_code }}</div>
        <div class="mb-2"><strong>Time Zone:</strong> {{ Auth::user()->country->country_time_zone }}</div>
        <div class="mb-2"><strong>Currency:</strong> {{ Auth::user()->country->country_currency }}</div>
        <div class="mb-2"><strong>Currency Symbol:</strong> {{ Auth::user()->country->country_currency_symbol }}</div>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="btn btn-danger">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endsection