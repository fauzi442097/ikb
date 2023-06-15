@extends('guest.layout')

@section('guest-content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex gap-2 align-items-center">
        <i class="bi bi-house fs-2x icon color-primary-logo fw-bold"></i>
    </div>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Data Member </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

<div class="mt-8 bg-white rounded-3 p-8">
    <form class="form" novalidate="novalidate" id="kt_free_trial_form" method="POST" action="{{ route('guest.login') }}">
        @csrf
        <div class="mb-4">
            <h1 class="text-dark mb-3">Login</h1>
        </div>
        <div class="fv-row mb-6 mb-lg-10">
            <label class="form-label text-dark fs-6">NIK</label>
            <input class="form-control form-control-solid @error('nik') is-invalid @enderror" type="text" placeholder="" name="nik" value="{{ old('nik') }}" autocomplete="off" />
            @error('nik')
                <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
            @enderror
        </div>
        <div class="fv-row mb-6 mb-lg-10">
            <label class="form-label text-dark fs-6">Nama Lengkap</label>
            <input class="form-control form-control-solid @error('name') is-invalid @enderror" type="text" placeholder="" name="name" value="{{ old('username') }}" autocomplete="off" />
            @error('name')
                <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
            @enderror
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection
