<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-2xs w-full']) !!}>
    {{ $slot }}
</select>