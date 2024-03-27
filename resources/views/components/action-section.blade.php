<div {{ $attributes->merge(['class' => '']) }}>
    <div class="d-lg-flex justify-content-between">
        <div class="col-md-5">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>
    
        <div class="col-md-7">
            <div class="card">
                <div class=" p-5">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
</div>
