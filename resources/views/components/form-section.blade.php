@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="d-lg-flex justify-content-between">
        <x-section-title class="col-md-5">
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>

        <div class="col-md-7">
            <div class="card">
                <form wire:submit="{{ $submit }}">
                    <div class="card-body">
                        {{ $form }}
                    </div>

                    @if (isset($actions))
                    <div class="card-footer">
                        {{ $actions }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>