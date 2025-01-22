<textarea
    {{ $attributes->merge([
        'id' => '',
        'name' => '',
        'placeholder' => '',
        'class' => 'max-w-2xl py-3 px-4 block w-full bg-stone-100 dark:bg-stone-700 focus:bg-stone-200 dark:focus:bg-stone-600 border-0 focus-visible:ring-0 text-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-stone-50 dark:stone-50 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600',
    ]) }}  
>{{ $slot }}</textarea>