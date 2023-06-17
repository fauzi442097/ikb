
<x-layout.index>
    <x-slot name="content">
        <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-dark fw-bolder my-1 fs-2">Detail Berita</h1>
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ route('admin.news') }}" class="text-gray-600 text-hover-primary">Berita</a>
                    </li>
                    <li class="breadcrumb-item text-gray-600">{{ $news->title }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center py-2 py-md-1">
                <a href="{{ route('admin.news') }}" class="btn btn-secondary me-5 btn-sm">Kembali</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-lg-20 pb-lg-0">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">
                        <div class="mb-17">
                            <div class="mb-8">
                                <div class="d-flex flex-wrap mb-6">
                                    <div class="me-9 my-1">
                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                            </svg>
                                        </span>
                                        <span class="fw-bolder text-gray-400"> {{ date('d/m/Y', strtotime($news->created_at)) }}</span>
                                    </div>
                                    <div class="me-9 my-1">
                                        <span class="fw-bolder text-gray-400"> {{ $news->category->name }}</span>
                                    </div>
                                    <!--end::Item-->

                                    <div class="my-1 me-9">
                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                                                <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                                            </svg>
                                        </span>
                                        <span class="fw-bolder text-gray-400">
                                            @if ( count($news->comments) > 0 )
                                                {{ count($news->comments) }} Komentar
                                            @else
                                                Belum ada komentar
                                            @endif
                                        </span>
                                    </div>

                                    <div class="my-1">
                                        <span class="svg-icon svg-icon-primary  svg-icon-2 svg-icon-2 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                               <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>
                                               <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
                                            </svg>
                                         </span>

                                        <span class="fw-bolder text-gray-400">
                                            {{ $news->author->name }}
                                        </span>
                                    </div>

                                </div>
                                <!--end::Info-->
                                <!--begin::Title-->
                                <span class="text-dark text-hover-primary fs-3 fw-bolder"> {{ $news->title }} </span>
                                <div class="overlay mt-8">
                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset($news->thumbnail) }}')"></div>
                                </div>
                            </div>
                            <div class="fs-5 fw-bold text-gray-600">
                                {!! $news->content !!}
                            </div>

                            <div class="mt-8">
                                @foreach ($news->tags as $tag)
                                    <span class="badge badge-secondary">{{ $tag->tag_name }}</span>
                                @endforeach
                            </div>

                            <p class="text-muted fs-6 mt-8">
                                Komentar
                                @if ( count($news->comments) > 0 )
                                    ({{ count($news->comments) }})
                                @else
                                    (Belum ada kometar)
                                @endif
                            </p>

                            <div class="d-flex flex-column mb-14 mt-10 gap-4">
                                @foreach ( $news->comments as $value )
                                    <div class="d-flex gap-2 px-8 py-4 flex-column rounded-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                        <p class="fw-bold mb-1 me-1 d-inline-block"> {{ $value->user->name }}
                                            <span class="text-muted fs-8">
                                                @if ($value->updated_at)
                                                    {{ $value->updated_at->locale('id_ID')->diffForHumans() }} (diedit)
                                                @else
                                                    {{ $value->created_at->locale('id_ID')->diffForHumans() }}
                                                @endif
                                            </span>
                                        </p>
                                        <div>
                                            {{ $value->comment }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="script">
    </x-slot>
 </x-layout.index>

