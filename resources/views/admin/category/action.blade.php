<x-slot name="script">
    <script type="text/javascript">

        $(document).ready(function() {

            @if (\Session::has('errorException'))
                showAlert('error', '{{ \Session::get('errorException') }}', 'Error');
            @endif

            $("#kt_table_category").DataTable({
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

        window.livewire.on('categoryCreated', () => {
            $("#modal-category").modal('hide');
            Livewire.emit('renderTableCategory', 'success', 'Data berhasil disimpan'); // call listener render category
        });

        window.livewire.on('setCategory', () => {
            $("#modal-category").modal('show');
            $("#modal-category-title").html('Edit Kategori Berita');
        });

        window.livewire.on('renderTableCategory', (result, message) => {
            $('[data-toggle="tooltip"]').tooltip();
            showAlert(result, message);
        });

        function showModal(action, id, category_name)
        {
            $('#form-create-category')[0].reset();
            $("#modal-category-title").html('Tambah Kategori Berita');
            $("#modal-category").modal('show');
        }

        function deleteCategory(category_id)
        {
            showAlertConfirm('warning', 'Hapus Data', 'hapus data ini?', 'Hapus', function(){
                Livewire.emit('deleteCategory', category_id);
            });
        }
    </script>
</x-slot>
