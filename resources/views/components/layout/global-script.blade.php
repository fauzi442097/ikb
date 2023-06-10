<script type="text/javascript">
    function showAlert(type, message, title, buttonName = 'Ok') {
        Swal.fire({
            title: title,
            html: message,
            icon: type,
            buttonsStyling: false,
            confirmButtonText: buttonName,
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    }

    function showAlertConfirm(type, title, message, confirmText, callback)
    {
        Swal.fire({
            title: title,
            text: message,
            icon: type,
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: confirmText,
            customClass: {
                confirmButton: 'btn btn-sm btn-primary',
                cancelButton: 'btn btn-sm btn-light'
            },
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                if( typeof callback == "function" ) {
                    callback();
                }
            }
        })
    }
</script>
