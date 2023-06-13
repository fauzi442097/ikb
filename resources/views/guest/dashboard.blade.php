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
