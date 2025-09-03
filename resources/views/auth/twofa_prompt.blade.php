@extends('layouts.guest')

@section('content')
<div class="card p-4 shadow">
    <h2 class="mb-3">Two-Factor Authentication</h2>

    {{-- Instructions --}}
    <p>
        For better security, we recommend enabling Two-Factor Authentication (2FA) on your account.
        This adds an extra layer of protection to prevent unauthorized access.
    </p>

    {{-- Buttons --}}
    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('twofa.enable') }}" class="btn btn-success">Enable 2FA</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Not Now</a>
    </div>
</div>
@endsection