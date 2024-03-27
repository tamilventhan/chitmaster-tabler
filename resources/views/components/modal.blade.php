@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));

$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    id="{{ $id }}"
    class="jetstream-modal border-top mt-5"
    style="display: none;"
>
    <div x-show="show" class="fixed" x-on:click="show = false">
        {{-- <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div> --}}
    </div>

    <div x-show="show" class=" {{ $maxWidth }}">
        {{ $slot }}
    </div>
</div>
