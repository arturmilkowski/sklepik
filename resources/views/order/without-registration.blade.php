<x-layout>
    <x-slot:title>Zamówienie bez rejestracji</x-slot>
        <h1>Zamówienie bez rejestracji</h1>
        <form action="{{ route('orders.without-registration.store') }}" method="POST" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Imię</label>
                <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="surname">Nazwisko</label>
                <input class="form-control @error('surname')is-invalid @enderror" type="text" id="surname" name="surname" value="{{ old('surname') }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="surname">Ulica i numer mieszkania</label>
                <input class="form-control @error('street')is-invalid @enderror" type="text" id="street" name="street" value="{{ old('street') }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="zip_code">Kod pocztowy</label>
                <input class="form-control @error('zip_code')is-invalid @enderror" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" pattern="^[0-9]{2}-[0-9]{3}$" size="6" placeholder="pole obowiązkowe" required>
                @error('zip_code')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="city">Miasto</label>
                <input class="form-control @error('city')is-invalid @enderror" type="text" id="city" name="city" value="{{ old('city') }}" placeholder="pole obowiązkowe" minlength="3" maxlength="60" required>
                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="voivodeship_id">Województwo</label>
                <select class="form-control @error('voivodeship_id')is-invalid @enderror" id="voivodeship_id" name="voivodeship_id" required>
                    @foreach ($voivodeships as $voivodeship)
                    @if (old('voivodeship_id') == $voivodeship->id)
                    <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
                    @else
                    <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('voivodeship_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control @error('email')is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" minlength="5" maxlength="30" placeholder="pole obowiązkowe" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="phone">Telefon</label>
                <input class="form-control @error('phone')is-invalid @enderror" type="tel" id="phone" name="phone" value="{{ old('phone') }}" size="9" placeholder="pole nieobowiązkowe">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                <label for="comment">Komemtarz do zamówienia</label>
                <textarea class="form-control" id="comment" name="comment" maxlength="1000" rows="3" placeholder="pole nieobowiązkowe">{{ old('comment') }}</textarea>
                @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <div class="form-group">
                @foreach ($saleDocuments as $document)
                <div>
                    <input type="radio" name="sale_document_id" id="{{ $document->name }}" value="{{ $document->id }}" @if ($document->name == 'Brak') checked @endif @if (old('sale_document_id') == $document->id) checked @endif>
                    <label for="{{ $document->name }}">{{ $document->description }}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input @error('term')is-invalid @enderror" id="term" name="term" value="term" @if (old('term')) checked @endif>
                <label class="form-check-label" for="term">Akceptuję regulamin</label>
                @error('term')<div class="invalid-feedback">{{ $message }}</div>@enderror

            </div>

            <button type="submit">Wyślij zamówienie</button>
        </form>
</x-layout>