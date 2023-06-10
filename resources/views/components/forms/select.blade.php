<select
    name="{{ $name }}"
    id="{{ isset($id) ? $id : $name}}"
    aria-label="Pilih"
    data-control="select2"
    data-placeholder="{{ isset($placeholder) ? $placeholder : ''}}"
    class="form-select {{ isset($class) ? $class : '' }}"
    {{ $attributes }}
>
    {{ $slot }}
</select>
