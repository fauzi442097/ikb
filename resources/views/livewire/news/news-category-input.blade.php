{{-- <div wire:ignore> --}}
    @foreach ( $categories as $category )
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
{{-- </div> --}}
