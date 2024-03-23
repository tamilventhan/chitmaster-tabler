@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-red']) }}>{{ $message }}</p>
@enderror
