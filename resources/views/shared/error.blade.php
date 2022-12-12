@if ($errors->first($name))
    <div>
        <span class="text-danger fw-bold">
            {{ $errors->first($name) }}
        </span>
    </div>
@endif
