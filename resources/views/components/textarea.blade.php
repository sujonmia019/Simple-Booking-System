<div class="mb-2 {{ $groupClass ?? '' }}">
    @if (!empty($label))
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $label }}</label>
    @endif
    <textarea class="form-control form-control-sm rounded-0 shadow-none {{ $class ?? '' }}" name="{{ $name }}" id="{{ $id ?? $name }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? '3' }}">{{ $value ?? '' }}</textarea>
    @if (!empty($optional))
        <p class="optional-text mb-0">{{ $optional }}</p>
    @endif
    @isset($name)
        @error($name)
            <small class="text-danger d-block">{{ $message }}</small>
        @enderror
    @endisset
</div>
