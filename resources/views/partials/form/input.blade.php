<div class="form-group">
    @if(isset($label))
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    <input
            type="{{ $type ?? 'text' }}"
            name="{{ $name }}"
            class="form-control"
            id="{{ $id }}"
            aria-describedby="{{ $id }}Help"
            placeholder="{{ $placeholder ?? '' }}"
            value="{{ $value ?? '' }}"
    >
    @if(isset($description))
        <small id="{{ $id }}Help" class="form-text text-muted">{{ $description }}</small>
    @endif
</div>