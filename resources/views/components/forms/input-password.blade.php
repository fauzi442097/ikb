<div class="input-group">
    <input
        type="password"
        class="form-control {{ isset($class) ? ($class) : ''}}"
        value="{{ isset($value) ? $value : '' }}"
        {{ $attributes }}
    />
    <span class="input-group-text border-0 cursor-pointer" onclick="togglePassword(this)">
        <i class="bi bi-eye-slash fs-2"></i>
        <i class="bi bi-eye fs-2 d-none"></i>
    </span>
</div>
