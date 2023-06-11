<x-layout.head title="Kategori Berita | Admin">
 </x-layout.head>

 <x-layout.index>

    <x-slot name="content">

       <div class="d-flex flex-wrap flex-stack mb-6">
          <h1 class="fw-bolder my-2"> Kategori Berita </h1>
          <div class="d-flex align-items-center my-2">
             <button onclick="showModal('create')" class="btn btn-primary btn-sm">Tambah Kategori</button>
          </div>
       </div>

       <div class="content flex-column-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_category">
                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-100px">No</th>
                            <th class="min-w-125px">Kategori</th>
                            <th class="text-end min-w-100px">Aksi</th>
                        </tr>
                    </thead>
                    @livewire('category-table')
                </table>
            </div>
        </div>
    </div>

       @include('admin.category.modal')
    </x-slot>

    @include('admin.category.action')
 </x-layout.index>

