<x-layout.head title="Anggota | Admin">
</x-layout.head>

<x-layout.index>

   <x-slot name="content">

      <div class="d-flex flex-wrap flex-stack mb-6">
         <h1 class="fw-bolder my-2"> Anggota </h1>
         <div class="d-flex align-items-center my-2">
            {{-- <button onclick="showModal('create')" class="btn btn-primary btn-sm">Tambah Kategori</button> --}}
         </div>
      </div>

      <div class="content flex-column-fluid" id="kt_content">
            <div class="card">
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_member">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-100px">No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Tanggal Bergabung</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        @livewire('member.member-table')
                    </table>
                </div>
            </div>
        </div>

   </x-slot>

   @include('admin.member.action')
</x-layout.index>

