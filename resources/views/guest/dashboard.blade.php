@extends('guest.layout')

@section('guest-content')
<div class="d-flex justify-content-between align-items-center">
    <div class="d-flex gap-2 align-items-center">
        <i class="bi bi-house icon fs-2x color-primary-logo fw-bold"></i>
    </div>

    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Home </p>
    <div>
        <i class="bi bi-bell-fill fs-2x"></i>
    </div>
</div>

<h2 class="mt-10 color-primary-logo"> Hi, {{ auth()->user()->name }} </h2>

<div class="d-flex justify-content-between align-items-center notification-finish-profile mt-4 rounded-3 py-2 px-4">
    <div>
        <p class="color-primary-logo fs-6 mb-1"> Anda belum mengkapi data keanggotaan</p>
        <p class="mt-2"> Silakan <a href="{{ route('guest.fill_data_member') }}"> lengkapi data </a> terlebih dahulu</p>
    </div>
    <img src="{{ asset('img/not-finish-yet.png') }}" width="100"/>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        @if (\Session::has('success'))
            Swal.fire({
                title: 'Registrasi Sukses',
                html: 'Selamat Anda telah tergabung sebagai member IKB Silakan lengkapi data terlebih dahulu',
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        @endif
    </script>
@endsection
