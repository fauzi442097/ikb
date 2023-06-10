<input
    type="{{ isset($type) ? $type : 'text' }}"
    name="{{ $name }}"
    id="{{ isset($id) ? $id : $name}}"
    class="form-control {{ isset($class) ? ($class) : ''}}"
    value="{{ isset($value) ? $value : '' }}"
    {{ $attributes }}
>
