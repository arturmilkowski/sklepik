<x-layout>
    <x-slot:title>Zamówienie</x-slot>
        <h1>Zamówienie</h1>
        <div class="mx-2">
            <table border="1">
                <tbody>
                    <tr>
                        <td colspan="2">Dane osobowe i adres</td>
                    </tr>
                    <tr>
                        <td>Imię</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Nazwisko</td>
                        <td>{{ $user->profile->surname }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{ $user->profile->phone }}</td>
                    </tr>
                    <tr>
                        <td>Ulica</td>
                        <td>{{ $user->profile->street }}</td>
                    </tr>
                    <tr>
                        <td>Kod pocztowy</td>
                        <td>{{ $user->profile->zip_code }}</td>
                    </tr>
                    <tr>
                        <td>Miasto</td>
                        <td>{{ $user->profile->city }}</td>
                    </tr>
                    <tr>
                        <td>Województwo</td>
                        <td>{{ $user->profile->voivodeship->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if ($user->profile->deliveryAddress)
        <div class="mx-2 mt-8">
            <table border="1">
                <tbody>
                    <tr>
                        <td colspan="2">Dostawa na adres</td>
                    </tr>
                    <tr>
                        <td>Ulica i numer mieszkania (domu)</td>
                        <td>{{ $user->profile->deliveryAddress->street }}</td>
                    </tr>
                    <tr>
                        <td>Kod pocztowy i miasto</td>
                        <td>{{ $user->profile->deliveryAddress->zip_code }} {{ $user->profile->deliveryAddress->city }}</td>
                    </tr>
                    <tr>
                        <td>Województwo</td>
                        <td>{{ $user->profile->deliveryAddress->voivodeship->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        <div class="mx-2 mt-8">
            <table border="1">
                <tbody>
                    <tr>
                        <td colspan="2">Dostawa</td>
                    </tr>
                    <tr>
                        <td>Dostawa</td>
                        <td>{{ $deliveryName }}</td>
                    </tr>
                    <tr>
                        <td>Sposób dostawy</td>
                        <td>{{ $deliveryMethod }}</td>
                    </tr>
                    <tr>
                        <td>Koszt dostawy</td>
                        <td>{{ $deliveryCost }}</td>
                    </tr>
                    <tr>
                        <td>Koszt zamówienia wraz z dostawą</td>
                        <td>{{ $totalPriceAndDeliveryCost }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mx-2 mt-8">
            <form action="{{ route('orders.with-registration.store') }}" method="POST" novalidate>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    @foreach ($saleDocuments as $document)
                    <div>
                        <input type="radio" name="sale_document_id" id="{{ $document->name }}" value="{{ $document->id }}" @if ($document->name == 'Brak') checked @endif @if (old('sale_document_id') == $document->id) checked @endif>
                        <label for="{{ $document->name }}">{{ $document->description }}</label>
                    </div>
                    @endforeach
                </div>
                <div>
                    <label for="comment">Komentarz do zamówienia</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" maxlength="1000" rows="3" placeholder="komentarz do zamówienia">{{ old('comment') }}</textarea>
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input @error('term')is-invalid @enderror" id="term" name="term" value="term" @if (old('term')) checked @endif>
                    <label class="form-check-label" for="term">Akceptuję regulamin</label>
                    @error('term')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <p>
                    <a href="{{ route('orders.checkout.index') }}">Powrót do kasy</a>
                    <button type="submit">Wyślij zamówienie</button>
                </p>
            </form>
        </div>
</x-layout>