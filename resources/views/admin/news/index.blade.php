<x-layout.head title="News | Admin">
</x-layout.head>

<x-layout.index>

   <x-slot name="content">
      <div class="d-flex flex-wrap flex-stack mb-6">
         <h1 class="fw-bolder my-2"> Berita </h1>
         <div class="d-flex align-items-center my-2">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.news.create') }}">Tambah Berita</a>
         </div>
      </div>
      @livewire('news.news-index')
   </x-slot>

   <x-slot name="script">
        <script type="text/javascript">
            @if (\Session::has('success'))
                showAlert('success', '{{ \Session::get('success') }}', 'Sukses');
            @endif

            window.livewire.on('renderNews', (result, message) => {
                $('[data-toggle="tooltip"]').tooltip();
                showAlert(result, message);
            });

            function deleteNews(news_id)
            {
                event.preventDefault();
                showAlertConfirm('warning', 'Hapus Data', 'hapus berita ini?', 'Hapus', function(){
                    Livewire.emit('deleteNews', news_id);
                });
            }
        </script>
   </x-slot>


</x-layout.index>

