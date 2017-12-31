<div class="form-horizontal-field">
    <div class="w-full md:w-1/5">
        <label for="{{ $name }}" class="form-horizontal-label">{{ $label ?? ucfirst($name) }}</label>
    </div>
    <div class="w-full md:w-3/5 form-checkbox">
        <input type="checkbox" id="{{ $id ?? $name }}" name="{{ $name }}" {{ old($name, $checked) ? 'checked' : '' }}>
    </div>
</div>