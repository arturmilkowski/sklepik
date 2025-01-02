@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-400 hover:border-gray-900 focus:border-gray-900 focus:ring-gray-900 w-full']) !!}>{{ $slot }}</textarea>