@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div>
        <form wire:submit="{{ $submit }}">
            <div class="card p-2">
            <div class="card-body">
                    {{ $form }}
            </div>


                @if (isset($actions))
                <div class="card-footer">
                    {{ $actions }}
                </div>
                @endif
            </div>
        </form>
    </div>
</div>