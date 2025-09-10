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
        {{-- Profile Picture --}}
        <div class="text-center mb-3">
            @if(auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                alt="Profile Picture"
                class="rounded-circle"
                width="120" height="120">
            @else
            <img src="https://via.placeholder.com/120"
                alt="Default Profile"
                class="rounded-circle">
            @endif
        </div>

        <div class="mb-3"><strong>First Name:</strong> {{ auth()->user()->first_name }}</div>
        <div class="mb-3"><strong>Last Name:</strong> {{ auth()->user()->last_name }}</div>
        <div class="mb-3"><strong>Email:</strong> {{ auth()->user()->email }}</div>
        <div class="mb-3"><strong>Phone No.:</strong> {{ auth()->user()->phone_no }}</div>
        <div class="mb-3"><strong>Alt Phone No.:</strong> {{ auth()->user()->alt_phone_no }}</div>
        <div class="mb-3"><strong>State:</strong> {{ auth()->user()->state }}</div>
        <div class="mb-3"><strong>City:</strong> {{ auth()->user()->city }}</div>
        <div class="mb-3"><strong>Pincode:</strong> {{ auth()->user()->pincode }}</div>
        <div class="mb-3"><strong>Country:</strong> {{ auth()->user()->country?->country_name }}</div>

        {{-- Extra Country Info --}}
        @if(auth()->user()->country)
        <hr>
        <h5>Country Details</h5>
        <div class="mb-2"><strong>Country Code:</strong> {{ auth()->user()->country->country_code }}</div>
        <div class="mb-2"><strong>Telephone Code:</strong> {{ auth()->user()->country->country_tel_code }}</div>
        <div class="mb-2"><strong>Time Zone:</strong> {{ auth()->user()->country->country_time_zone }}</div>
        <div class="mb-2"><strong>Currency:</strong> {{ auth()->user()->country->country_currency }}</div>
        <div class="mb-2"><strong>Currency Symbol:</strong> {{ auth()->user()->country->country_currency_symbol }}</div>
        @endif
    </div>

    <div class="mt-4 d-flex justify-content-between">
        {{-- Edit Button --}}
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            Edit Profile
        </a>

        {{-- Logout --}}
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