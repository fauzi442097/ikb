@extends('guest.layout')

@section('guest-content')
<div class="d-flex align-items-center justify-content-between">
    <a href="{{ $urlBack }}" class="p-2 bg-white rounded-circle d-flex align-items-center justify-content-center">
        <i class="la la-arrow-left fs-2x icon color-primary-logo font-bold"></i>
    </a>
    <p class="color-primary-logo align-self-center mt-2 fs-2x fw-bolder"> Data Member </p>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>

<div class="mt-8 bg-white rounded-3 p-8">
    @livewire('guest.form-fill-member', ['type' => $type])
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            window.livewire.on('data_member_updated', (msg, nextRoute) => {
                showAlertConfirm('success', 'Sukses', msg, 'Tutup', function(){
                    window.location.href = nextRoute;
                }, false);
            });

            window.livewire.on('re_render_form', () => {
                reinitDatepicker();
            });
        });
    </script>
@endsection
