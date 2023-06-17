@extends('guest.layout')

@section('guest-content')
<div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('guest.profile') }}" class="p-2 bg-white rounded-circle d-flex align-items-center justify-content-center">
        <i class="la la-arrow-left fs-2x icon color-primary-logo font-bold"></i>
    </a>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Profil Saya </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

<div class="mt-8 mb-8 bg-white rounded-3 p-8">
    <div class="rounded-pill bg-white d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('img/avatar-profile2.png') }}" height="40"/>
        <h3 class="mb-2"> {{ $profile->name }}</h3>
        <span class="text-muted fs-7"> Bergabung sejak {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime(auth()->user()->created_at))) }} </span>
    </div>
    <p class="fs-5 mb-2 text-muted mt-10 fw-light"> Data Member </p>
    <div class="d-flex flex-column gap-5 mt-2">
        <div class="info-profile">
            <label class="fs-7 text-muted"> NIK </label>
            <div class="fs-6"> {{ $profile->nik }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> Nama Lengkap </label>
            <div class="fs-6"> {{ $profile->name }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> Tempat / Tanggal Lahir </label>
            <div class="fs-6"> {{ $profile->birth_place }} / {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime($profile->birth_date))) }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> No HP </label>
            <div class="fs-6"> {{ $profile->phone_no }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> Alamat </label>
            <div class="fs-6"> {{ $profile->address }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> Email </label>
            <div class="fs-6"> {{ $profile->user->email }} </div>
        </div>
    </div>

    <p class="fs-5 mb-2 text-muted mt-10 fw-light"> Data Akun </p>
    <div class="d-flex flex-column gap-5 mt-2">
        <div class="info-profile">
            <label class="fs-7 text-muted"> Username </label>
            <div class="fs-6"> {{ $profile->user->username }} </div>
        </div>
        <div class="info-profile">
            <label class="fs-7 text-muted"> Password </label>
            <div class="fs-6"> ********* </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
