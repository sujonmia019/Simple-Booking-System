<div class="mb-2 {{ $groupClass ?? '' }}">
    @if (!empty($label))
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $label }}</label>
    @endif
    <input type="{{ $type ?? 'text' }}" class="form-control form-control-sm rounded-0 shadow-none {{ $class ?? '' }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}" autocomplete="off">
    @if (!empty($optional))
        <p class="optional-text mb-0">{{ $optional }}</p>
    @endif
    @isset($name)
        @error($name)
            <small class="text-danger d-block">{{ $message }}</small>
        @enderror
    @endisset
</div>
