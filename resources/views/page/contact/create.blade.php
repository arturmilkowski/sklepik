<x-layout>
    <x-slot:title>Kontakt</x-slot>
    <h1>Kontakt</h1>
    <form action="{{ route('pages.contacts.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="subject">Temat</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Temat wiadomości" required>
            @error('subject')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="content">Treść</label>
            <textarea name="content" id="content" placeholder="Treść wiadomości" required>{{ old('content') }}</textarea>
            @error('content')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="author">Podpis</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}" placeholder="Podpis">
            @error('author')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" required>
            @error('email')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="human">
            <input type="checkbox" id="human" name="i_am_not_a_robot">
            <label for="human">I am not a robot</label>
        </div>
        <button type="submit">Wyślij</button>
    </form>
</x-layout>
