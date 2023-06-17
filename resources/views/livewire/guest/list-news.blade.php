<div class="d-flex flex-column gap-6 mt-8">
    @forelse ( $news as $item )
        <div class="rounded-2 w-100 p-2 bg-white d-flex align-items-start gap-4 cursor-pointer container-news-mobile"
            onclick="window.location.href='{{ route('guest.news.detail', ['slug' => $item->slug]) }}'">
            <div class="h-60px w-80px bg-primary rounded-2 overflow-hidden" style="flex-basis: 80px;
            flex-grow: 0;
            flex-shrink: 0;">
                <img src="{{ asset($item->thumbnail) }}" alt="news-img" class="list-news-img"/>
            </div>
            <div>
                <h4 class="mb-2 title-news"> {{ $item->title }} </h4>
                <div class="d-flex gap-4 fs-8">
                    <div class="info-news">
                        <i class="fas fa-user"></i>
                        {{ $item->author->name }}
                    </div>
                    <div class="info-news">
                        <i class="fas fa-clock"></i>
                        {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime($item->created_at))) }}
                    </div>
                    <div class="info-news">
                        <i class="fas fa-comment"></i>
                        {{ $item->comments_count }}
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse

    <div class="d-flex flex-stack flex-wrap my-4 justify-content-end">
        {{ $news->links() }}
    </div>
</div>
