<li class="nav-item {{ $item['class'] }}" @isset($item['id']) id="{{ $item['id'] }}" @endisset>
    <a wire:navigate.hover class="nav-link " @isset($item['target']) target="{{ $item['target'] }}" @endisset
    {!! $item['data-compiled'] ?? '' !!}
    href="{{ $item['href'] }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
              @if(isset($item['icon']))
                            <i class="{{ $item['icon'] ?? '' }} {{
                isset($item['icon_color']) ? 'text-' . $item['icon_color'] : 'text-pink'
            }}"></i>
                        @else
                            <i class="ti ti-brand-tabler"></i>
                        @endif
                    </span>
        <span class="nav-link-title">
                            {{ $item['text'] }}
        </span>
    </a>
</li>
