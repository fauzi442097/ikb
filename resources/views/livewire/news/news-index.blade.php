
<div>
   <div class="row g-6 g-xl-9">
      @foreach ($news as $item)
      {{-- onclick="window.location.href='{{ route('admin.news.show', ['id' => $item->id]) }}'" --}}
      <div class="col-sm-6 col-xl-3 cursor-pointer">
         <div class="card h-100">

            <div class="card-header flex-nowrap border-0 pt-9">
               <div class="card-title m-0 w-100 position-relative">
                  <img src="{{ asset($item->thumbnail) }}" alt="news-thumbnail-{{ $item->id }}" class="w-100" style="height: 250px;object-fit: contain;"/>
                     @if ( $item->published )
                        <span class="badge badge-success position-absolute end-0" style="top:-15px">Published</span>
                     @else
                        <span class="badge badge-warning position-absolute end-0" style="top:-15px">Unpublished</span>
                     @endif
               </div>
            </div>

            <div class="card-body d-flex flex-column px-8 pb-8 align-items-start">
               <div>
                  <span class="badge badge-light badge-lg mb-4 fs-8"> {{ $item->category->name }} </span>
                  <div class="fs-5 fw-bold mb-3">{{ \Illuminate\Support\Str::limit($item->title, 80, '...') }}</div>
                  <div class="d-flex align-items-center flex-wrap mb-5 mt-8 fs-7 w-100">
                     {!! \Illuminate\Support\Str::limit($item->content, 50, '...') !!}
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
      @endforeach
   </div>

   <div class="d-flex flex-stack flex-wrap pt-10">
      {{ $news->links() }}
   </div>
</div>