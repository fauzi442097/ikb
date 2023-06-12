@extends('guest.layout')

@section('guest-content')
<div class="d-flex justify-content-between">
    <div class="fs-6 color-primary-logo"> Halo, <h5 class="d-inline-block color-primary-logo"> {{ auth()->user()->name }}</h5> </div>
    <div>
        <i class="bi bi-bell-fill fs-2x"></i>
    </div>
</div>
@endsection

@section('script')
@endsection
