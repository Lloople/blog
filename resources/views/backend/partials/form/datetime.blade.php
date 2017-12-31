<div class="form-horizontal-field">
    <div class="w-full md:w-1/5">
        <label for="{{ $id ?? $name }}" class="form-horizontal-label">{{ $label ?? ucfirst($name) }}</label>
    </div>
    <div class="w-full md:w-3/5">
        <input id="{{ $id ?? $name }}" type="datetime-local" name="{{ $name }}" class="form-input" value="{{ old($name, $value) }}">
        @if ($errors->has($name))
            <p class="text-red block">{{ implode('<br>', $errors->get($name)) }}</p>
        @endif
    </div>
</div>