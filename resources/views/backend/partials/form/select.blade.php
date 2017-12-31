<div class="form-horizontal-field">
    <div class="w-full md:w-1/5">
        <label for="{{ $id ?? $name }}" class="form-horizontal-label">{{ $label ?? ucfirst($name) }}</label>
    </div>
    <select id="{{ $id ?? $name }}" name="{{ $name }}" class="w-full md:w-3/5 form-input">
        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ $optionValue === $selected ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</div>