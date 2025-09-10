@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2>Edit Profile</h2>

    {{-- Success / Error Messages --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card p-4 shadow-sm">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control"
                        placeholder="Enter your first name"
                        value="{{ old('first_name', auth()->user()->first_name) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control"
                        placeholder="Enter your last name"
                        value="{{ old('last_name', auth()->user()->last_name) }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    placeholder="Enter your email address"
                    value="{{ old('email', auth()->user()->email) }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Phone No</label>
                    <input type="text" name="phone_no" class="form-control"
                        placeholder="Enter your phone number"
                        value="{{ old('phone_no', auth()->user()->phone_no) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Alt Phone No</label>
                    <input type="text" name="alt_phone_no" class="form-control"
                        placeholder="Enter alternate phone number"
                        value="{{ old('alt_phone_no', auth()->user()->alt_phone_no) }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Profile Picture</label>
                <input type="file" name="profile_picture" class="form-control">
                @if(auth()->user()->profile_picture)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                        width="80" height="80" class="rounded-circle">
                </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>State</label>
                    <input type="text" name="state" class="form-control"
                        placeholder="Enter your state"
                        value="{{ old('state', auth()->user()->state) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>City</label>
                    <input type="text" name="city" class="form-control"
                        placeholder="Enter your city"
                        value="{{ old('city', auth()->user()->city) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Pincode</label>
                    <input type="text" name="pincode" class="form-control"
                        placeholder="Enter your area pincode"
                        value="{{ old('pincode', auth()->user()->pincode) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Country</label>
                    <select name="country_id" class="form-control">
                        <option value="">-- Select your country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ auth()->user()->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->country_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Update Profile</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection