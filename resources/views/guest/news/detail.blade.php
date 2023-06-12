@extends('guest.layout')

@section('guest-content')
<div class="d-flex gap-2 justify-content-between align-items-center">
    <a href="{{ route('guest.news') }}">
        <i class="la la-arrow-left fs-3x icon color-primary-logo font-bold"></i>
    </a>
    <img src="{{ asset('img/logo.jpg') }}" alt="logo-brand" class="h-40px">
</div>

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

        <p class="text-muted fs-6 mt-4 mb-4"> Komentar ({{ count($news->comments) }}) </p>
        <div class="py-8 px-4 mb-8 rounded-2 d-flex flex-column gap-6" style="background: #F4F4F4" class="w-100">

            <div class="d-flex gap-2">
                <div class="rounded-1 w-100 py-4">
                    <div class="d-flex align-items-center gap-1">
                        <p class="fw-bold mb-1"> {{ auth()->user()->name }} </p>
                    </div>
                    <div>
                        <textarea class="form-control mb-2" placeholder="Berikan tanggapan" rows="4"></textarea>
                        <div class="text-end w-100">
                            <button class="btn btn-primary btn-sm"> Kirim </button>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ( $news->comments as $item)
                <div class="d-flex gap-2">
                    <div class="bg-white rounded-1 w-100 px-4 py-4">
                        <div class="d-flex align-items-center gap-1">
                            <p class="fw-bold mb-1"> {{ $item->user->name }} </p>
                            <span class="text-muted fs-9">
                                - {{ $item->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div> {{ $item->comment }} </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
