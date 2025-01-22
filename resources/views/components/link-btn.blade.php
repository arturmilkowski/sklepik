@props(['href', 'title' => ''])

<a href="{{ $href }}" title="{{ $title }}" class="border border-stone-900 dark:border-stone-600 hover:bg-stone-100 hover:border-dashed dark:hover:bg-stone-900 dark:hover:text-stone-300 py-2 px-6">{{ $slot }}</a>