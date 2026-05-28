@props([
'page' => '',
'title' => '',
'subtitle' => '',
'parentLabel' => 'Home',
'parentHref' => '/',
])

<div class="bc-bar">
    <div class="bc-inner">
        <nav class="bc-nav">
            <a href="{{ $parentHref }}">{{ $parentLabel }}</a>
            <i class="fas fa-chevron-right"></i>
            <span>{{ $page }}</span>
        </nav>
        @if($title || $subtitle)
        <div class="bc-title">
            @if($title) <h1>{{ $title }}</h1> @endif
            @if($subtitle) <p>{{ $subtitle }}</p> @endif
        </div>
        @endif
    </div>
</div>