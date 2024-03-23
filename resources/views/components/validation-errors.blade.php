@if ($errors->any())
    <div {{ $attributes }}>
        <div class="invalid-feedback">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="fee">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
