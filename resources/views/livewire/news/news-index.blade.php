
<div>
   <div class="row g-6 g-xl-9">
      @forelse ($news as $item)
      <div class="col-sm-6 col-xl-3">
         <div class="card h-100">
            <div class="card-header flex-nowrap border-0 p-0 w-100 overflow-hidden">
               <div class="card-title m-0 w-100 position-relative">
                  <img src="{{ asset($item->thumbnail) }}" alt="news-thumbnail-{{ $item->id }}" class="w-100" style="height: 230px;object-fit: cover;"/>
                     @if ( $item->published )
                        <span class="badge badge-success position-absolute" style="top:9px; right: 12px;">Published</span>
                     @else
                        <span class="badge badge-warning position-absolute end-0" style="top:9px; right: 12px;">Unpublished</span>
                     @endif
               </div>
            </div>

            <div class="card-body d-flex flex-column px-4 pt-4 pb-4 align-items-start justify-content-between">
               <div>
                  <span class="badge badge-light badge-lg mb-4 fs-8"> {{ $item->category->name }} </span>
                  <div class="fs-5 fw-bold mb-3 news-title cursor-pointer" onclick="window.location.href='{{ route('admin.news.show', ['id' => $item->id]) }}'">{{ \Illuminate\Support\Str::limit($item->title, 80, '...') }}</div>
                  <div class="d-flex align-items-center flex-wrap mb-5 fs-7 w-100 news-content cursor-pointer" onclick="window.location.href='{{ route('admin.news.show', ['id' => $item->id]) }}'">
                     {!! \Illuminate\Support\Str::limit($item->content, 50, ' ... (Baca selengkapnya)') !!}
                  </div>
               </div>

               <div class="d-flex align-items-center justify-content-between flex-wrap w-100">
                  <div class="d-flex align-items-center">
                     <i class="las la-comment fs-5 me-1"></i>
                     <span class="text-gray-400 fs-7">@if ( $item->comments_count > 0 ) {{ $item->comments_count }} Komentar @else Belum ada komentar @endif</span>
                  </div>
                  <div>
                     <button class="btn btn-icon btn-light-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah berita" onclick="window.location.href='{{ route('admin.news.update', ['id' => $item->id]) }}'"><i class="far fa-edit"></i></button>
                     <button class="btn btn-icon btn-light-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus berita" onclick="deleteNews('{{ $item->id }}')"><i class="la la-trash-alt fs-2"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @empty
      <div class="text-center pb-8" style="border-radius: .475rem">
            <img src="{{ asset('assets\media\illustrations\sigma-1\5.png') }}" alt="img-not-found-data" class="h-150px h-lg-300px"/>
            <div class="mt-8">
                <div class="fs-2 text-muted fw-bold"> Berita belum tersedia </div>
                <p class="fs-5"> <a class="link" href="{{ route('admin.news.create') }}"> Tambah berita </a>  terlebih dahulu </p>
            </div>
      </div>
      @endforelse
   </div>

   <div class="d-flex flex-stack flex-wrap pt-10">
      {{ $news->links() }}
   </div>
</div>
