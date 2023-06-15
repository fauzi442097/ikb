@extends('guest.layout')

@section('guest-content')
<div class="d-flex gap-2 justify-content-between align-items-center">
    <a href="{{ route('guest.news') }}" class="p-2 bg-white rounded-circle d-flex align-items-center justify-content-center">
        <i class="la la-arrow-left fs-2x icon color-primary-logo font-bold"></i>
    </a>
    <img src="{{ asset('img/logo-transparent.png') }}" alt="logo-brand" class="h-40px">
</div>
@livewire('guest.news-detail', ['slug' => $slug])
@endsection

@section('script')
 <script type="text/javascript">

    $(document).ready(function(){
        setDisabledButtonComment();
        window.livewire.on('alert_remove',()=>{
            setTimeout(function(){
                $(".alert-error-comment").slideUp()
            }, 3000);
        });

        window.livewire.on('success_delete_comment',() => {
            toastr.success("Komentar berhasil dihapus");
            KTMenu.init();
        });

        window.livewire.on('reinit_dropdown_menu',() => {
            KTMenu.init();
        });

        window.livewire.on('focus_input_comment', () => {
            $("#edit-comment").focus();
        });
    });

    function setDisabledButtonComment() {
        let value = $("#comment").val();
        if ( !value ) {
            $("#btn-komentar").attr('disabled', 'disabled')
        } else {
            $("#btn-komentar").removeAttr('disabled');
        }
    }

    function removeComment(comment_id) {
        showAlertConfirm('warning', 'Hapus Komentar', 'hapus komentar ini?', 'Hapus', function(){
            Livewire.emit('deleteComment', comment_id);
        });
    }
</script>
@endsection
