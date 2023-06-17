@extends('guest.layout')

@section('guest-content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex gap-2 align-items-center">
        <i class="bi bi-layers fs-2x icon color-primary-logo fw-bold"></i>
    </div>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Berita </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

@livewire('guest.list-news')
@endsection

@section('script')
@endsection
