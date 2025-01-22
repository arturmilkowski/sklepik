<x-layout>
    <x-slot:title>Kontakt</x-slot>

    <div class="flex mb-24 mx-2">
    <div class="w-2/6 border-t-[1px] hover:border-dashed border-stone-900 pt-4">-</div>
    <form class="w-4/6 ml-2 border-t-[1px] hover:border-dashed border-stone-900 pt-4" action="{{ route('pages.contacts.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <x-input-group>
            <x-input-label1 for="subject">Temat</x-input-label1>
            <x-input-text id="subject" name="subject" value="{{ old('subject') }}" placeholder="Temat wiadomości"></x-input-text>
            @error('subject')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
        </x-input-group>
        <x-input-group>
            <x-input-label1 for="content">Treść</x-input-label1>
            <x-input-textarea id="content" name="content" placeholder="Treść wiadomości">{{ old('content') }}</x-input-textarea>
            @error('content')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
        </x-input-group>
        <x-input-group>  
            <x-input-label1 for="author">Podpis</x-input-label1>
            <x-input-text id="author" name="author" value="{{ old('author') }}" placeholder="Podpis"></x-input-text>
            @error('author')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
        </x-input-group>
        <x-input-group>
            <x-input-label1 for="email">E-mail</x-input-label1>
            <x-input-text type="email" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail"></x-input-text>
            @error('email')
            <x-input-error1>{{ $message }}</x-input-error1>
            @enderror
        </x-input-group>
        <div class="human">
            <input type="checkbox" id="human" name="i_am_not_a_robot">
            <label for="human">I am not a robot</label>
        </div>
        <x-input-group>
            <button type="submit">Wyślij</button>
        </x-input-group>
    </form>
    </div>
</x-layout>
