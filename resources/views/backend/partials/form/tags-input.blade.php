<div class="form-horizontal-field">
    <div class="w-full md:w-1/5">
        <label for="{{ $id ?? $name }}" class="form-horizontal-label">{{ $label ?? ucfirst($name) }}</label>
    </div>
    <div class="w-full md:w-3/5">
        <tags-input
            inputname="{{ $name }}"
            :value="{{ json_encode($selected) }}"
            :options="{{ json_encode($options) }}">
        </tags-input>
    </div>
</div>