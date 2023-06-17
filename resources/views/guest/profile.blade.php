@extends('guest.layout')

@section('guest-content')
<div class="d-flex justify-content-between align-items-center">
    <div class="d-flex gap-2 align-items-center">
        <i class="bi bi-person icon fs-2x color-primary-logo fw-bold"></i>
    </div>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Profile </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

<div class="bg-white rounded-3 d-flex flex-column justify-content-between align-items-center mt-8 py-8 justify-content-center">
    <div class="rounded-pill bg-white">
        <img src="{{ asset('img/avatar-profile2.png') }}" height="40"/>
    </div>
    <div class="my-4 text-center">
        <h3 class="color-primary-logo mb-1"> {{ auth()->user()->name }}</h3>
        <span class="text-muted text-sm"> Bergabung sejak {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime(auth()->user()->created_at))) }} </span>
    </div>
    <button class="btn btn-sm btn-custom-primary" onclick="window.location.href='{{ route('guest.fill_data_member', ['type' => 'update']) }}'"> Edit Profile </button>
</div>

<div class="bg-white my-8 rounded-3 p-4 d-flex flex-column gap-2 menu-profile">
    <div class="py-3 d-flex gap-3 align-items-center cursor-pointer" onclick="window.location.href='{{ route('guest.myProfile') }}'">
        <i class="bi bi-person-square fs-5 color-primary-logo"></i>
        <span> Profile </span>
    </div>
    <div class="py-3 d-flex gap-3 align-items-center cursor-pointer" onclick="window.location.href='{{ route('guest.account') }}'">
        <i class="bi bi-key-fill fs-5 color-primary-logo"></i>
        <span> Ubah Password </span>
    </div>
    <div class="py-3 d-flex gap-3 align-items-center cursor-pointer" onclick="window.location.href='{{ route('guest.logout') }}'">
        <i class="bi bi-reply-fill fs-4 color-primary-logo"></i>
        <span> Log Out </span>
    </div>

</div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
