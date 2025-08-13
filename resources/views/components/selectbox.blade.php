<div class="mb-2 {{ $groupClass ?? '' }}">
    @if (!empty($label))
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control form-control-sm rounded-0 shadow-none {{ $class ?? '' }}" @if(!empty($onchange)) onchange="{{ $onchange }}" @endif @if(!empty($multiple)) multiple @endif>
        {{ $slot }}
    </select>
    @isset($name)
        @error($name)
            <small class="text-danger d-block">{{ $message }}</small>
        @enderror
    @endisset
</div>
