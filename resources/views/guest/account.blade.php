@extends('guest.layout')

@section('guest-content')
<div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('guest.profile') }}" class="p-2 bg-white rounded-circle d-flex align-items-center justify-content-center">
        <i class="la la-arrow-left fs-2x icon color-primary-logo font-bold"></i>
    </a>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Ubah Password </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

<div class="mt-8 bg-white rounded-3 p-8">
    @livewire('guest.form-account')
</div>
@endsection

@section('script')
    <script type="text/javascript">
        window.livewire.on('password_updated', (msg, nextRoute) => {
            showAlertConfirm('success', 'Sukses', msg, 'Tutup', function(){
                window.location.href = nextRoute;
            }, false);
        });
    </script>
@endsection
