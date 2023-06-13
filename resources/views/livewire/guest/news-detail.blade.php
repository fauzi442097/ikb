<div class="mt-8">
    <div class="mt-8">
        <h1 class="mb-4"> {{ $news->title }}</h1>
        <div class="mb-4 fs-8 text-muted">
            oleh <span class="fw-bold color-primary-logo"> {{ $news->author->name }}</span>
            - {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime($news->created_at))) }}
        </div>
        <div class="w-100 mh-150px rounded-2 overflow-hidden mb-8">
            <img src="{{ asset($news->thumbnail) }}" alt="image-news" loading="lazy" style="object-fit: cover; width: 100%">
        </div>
        <div>
            {!! $news->content !!}
        </div>

        <p class="text-muted fs-6 mt-8 mb-4"> Komentar ({{ count($news->comments) }}) </p>
        <div class="mb-8 rounded-2 d-flex flex-column gap-6" class="w-100">

            <div class="flex-column text-center" wire:loading>
                <span class="spinner-border text-primary" role="status"></span>
            </div>

            <div class="d-flex gap-2" wire:loading.class="d-none">
                <div class="rounded-2 w-100">
                    <div class="d-flex align-items-cen  ter gap-1">
                        <p class="fw-bold mb-1"> {{ auth()->user()->name }} </p>
                    </div>
                    <div>
                        <textarea wire:model.defer="comment" id="comment" class="form-control mb-2 rounded-3" placeholder="Tambahkan komentar" rows="3" onkeyup="setDisabledButtonComment()"></textarea>
                        <div class="text-end w-100">
                            <button class="btn btn-primary btn-sm" disabled id="btn-komentar" wire:click="storeComment('{{ $news->id }}')"> Komentar </button>
                        </div>
                    </div>
                </div>
            </div>

            @error('exceptionError')
                <div class="alert-error-comment">
                    <div class="alert alert-light-danger d-flex align-items-start align-items-lg-center p-1 py-3 py-lg-0 p-lg-1">
                        <i class="bi bi-exclamation-circle-fill ms-3 me-3 text-danger fs-2"></i>
                        <div class="d-flex flex-lg-row flex-column gap-0 gap-lg-1">
                            <h4 class="text-danger fs-7 mb-1">Gagal menyimpan komentar. </h4>
                            <span class="text-danger">{{ $message }}</span>
                        </div>

                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto btn-sm" data-bs-dismiss="alert">
                            <i class="bi bi-x fs-2 text-danger"></i>
                        </button>
                    </div>
                </div>
            @enderror

            @foreach ( $news->comments as $item)
                <div class="d-flex gap-2">
                    <div class="bg-white rounded-3 w-100 px-4 py-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="fw-bold mb-1 me-1 d-inline-block"> {{ $item->user->name }} </p>
                                <span class="text-muted fs-8">
                                    - {{ $item->created_at->diffForHumans() }}
                                </span>
                            </div>
                            @if ( auth()->user()->id == $item->user_id )
                                <span  data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </span>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true" style="">
                                    <div class="menu-item px-3">
                                        <a href="../../demo14/dist/apps/file-manager/files.html" class="menu-link px-3">
                                            <i class="bi bi-pencil-fill me-2"></i>
                                            Edit
                                        </a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="javascript:;" onclick="removeComment('{{ $item->id }}')" class="menu-link px-3" data-kt-filemanager-table="rename">
                                            <i class="bi bi-trash-fill me-2"></i>
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div> {{ $item->comment }} </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
