@props(['href', 'title' => ''])

<a href="{{ $href }}" title="{{ $title }}" class="border-b-[1px] border-gray-950 pb-1 hover:border-dotted">{{ $slot }}</a>