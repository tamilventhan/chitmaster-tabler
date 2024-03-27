@if ($errors->any())
    <div {{ $attributes }}>
        <div class="invalid-feedback">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="fee text-red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
