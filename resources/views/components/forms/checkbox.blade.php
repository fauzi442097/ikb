<input
    type="checkbox"
    name="{{ $name }}"
    id="{{ isset($id) ? $id : $name}}"
    class="form-check-input"
    {{ $attributes }}
/>
