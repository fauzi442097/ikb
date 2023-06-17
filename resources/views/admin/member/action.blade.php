<x-slot name="script">
    <script type="text/javascript">

        $(document).ready(function() {
            $("#kt_table_member").DataTable({
                "filter": true,
                "scrollY": "500px",
                "scrollCollapse": true,
                "paging": true,
                "language": {
                    "lengthMenu": "Show _MENU_",
                },
                "dom":
                    "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });
        })

        window.livewire.on('renderTableMember', function(result, message) {
            showAlert(result, message);
        });

        function resetPassword(memberId) {
            showAlertConfirm('warning', 'Warning', 'Reset password anggota ini?', 'Reset Password', function(){
                Livewire.emit('resetPassword', memberId);
            });
        }
    </script>
</x-slot>
