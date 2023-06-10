<!DOCTYPE HTML>
<x-layout.head title="Berita | Admin">
 </x-layout.head>

 <x-layout.index>
    <x-slot name="content">


        <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-dark fw-bolder my-1 fs-2">Tambah Berita</h1>
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ route('admin.news') }}" class="text-gray-600 text-hover-primary">Berita</a>
                    </li>
                    <li class="breadcrumb-item text-gray-600">Tambah Berita</li>
                </ul>
            </div>
            <div class="d-flex align-items-center py-2 py-md-1">
                <a href="{{ route('admin.news') }}" class="btn btn-secondary me-5 btn-sm">Kembali</a>
            </div>
        </div>

        <div class="row">

            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>                    
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-danger">Invalid Input</h4>
                        @foreach ($errors->all() as $error)
                            <span>{{$error}}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <form id="form-news" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf

                <x-forms.input type="hidden" name="news_id" value="{{ !is_null($news) ? $news->id : '' }}"/>
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <x-forms.label> Thumbnail Berita  </x-forms.label>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0 fv-row">
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" 
                                @if ( is_null($news))
                                    style="background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }})"
                                @else 
                                    style="background-image: url({{ asset($news->thumbnail) }})"
                                @endif
                            >
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="news_thumbnail" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted" style="font-size: .9rem">Maksimal size file 5MB</div>
                            <div class="text-muted" style="font-size: .9rem">Ekstensi file yang diizinkan .png, .jpg, .jpeg</div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-body">

                            <div class="fv-row">
                                <x-forms.label> Kategori Berita  </x-forms.label>
                                <x-forms.select name="news_category" placeholder="Pilih kategori berita" class="mb-1" onchange="revalidateSelect2(this, fv)">
                                    <option value="" selected disabled>Pilih kategori berita</option>
                                    @livewire('news.news-category-input')
                                </x-forms.select>
                            </div>


                            <button onclick="showModalCategory();" class="btn btn-light-primary btn-sm mb-8">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>Tambah kategori baru
                            </button>
                            <div class="fv-row mb-8">
                                <x-forms.label> Tag Berita  </x-forms.label>
                                <x-forms.input name="news_tags"/>
                            </div>

                            <div class="fv-row">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <x-forms.checkbox name="published" checked="checked"/>
                                    <label class="form-check-label" for="flexSwitchChecked">
                                        Publish Berita
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-body">
                                        <div class="mb-10 fv-row">
                                            <x-forms.label> Judul Berita </x-forms.label>
                                            <x-forms.input name="news_title" maxLength="100" value="{{ !is_null($news) ? $news->title : '' }}"/>

                                        </div>
                                        <div class="fv-row">
                                            <x-forms.label> Konten Berita </x-forms.label>
                                            <x-forms.textarea name="news_content"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.news') }}" class="btn btn-light btn-sm me-5">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary" onclick="validateForm();">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.category.modal')
    </x-slot>

    <x-slot name="script">
       @include('admin.news.action')
    </x-slot>
 </x-layout.index>

