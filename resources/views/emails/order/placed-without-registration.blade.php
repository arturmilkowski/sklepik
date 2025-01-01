Zamówienie (bez rejestracji) złożone

Identyfikator zamówienia: {{ $event->order->id }}
Data zamówienia: {{ $event->order->created_at }}
Status zamówienia: {{ $event->order->status->name }}
Wartość zamówienia: {{ $event->order->total_price }} zł
Dostawa: {{ $event->order->delivery_name }}
Koszt dostawy: {{ $event->order->delivery_cost }} zł
@if ($event->order->comment)
Komentarz:
{{ $event->order->comment }}
@endif

Zamówione produkty:
------------------------------------------------------------------------------
@foreach ($event->order->items as $item)
{{ $item->category }} {{ $item->concentration }} {{ $item->brand }} {{ $item->name }}
Cena: {{ $item->price }}
Ilość: {{ $item->quantity }}
Wartość: {{ $item->subtotal_price }}
------------------------------------------------------------------------------
@endforeach

Zamawiający:
{{ $event->customer->name }} {{ $event->customer->surname }}
{{ $event->customer->street }}
{{ $event->customer->zip_code }} {{ $event->customer->city }}
{{ $event->customer->voivodeship->name }}
Email: {{ $event->customer->email }}
@if ($event->customer->phone)
Telefon: {{ $event->customer->phone }}
@endif

------------------------------------------------------------------------------

Dokument zakupu: {{ $event->order->saleDocument->name }}
Do zapłaty: {{ number_format($event->order->total_price_and_delivery_cost, 2) }} zł
Numer konta: {{ config('settings.account_number') }}
Sposób zapłaty: {{ config('settings.delivery.methods_of_payment.prepayment') }}

Dane firmy:
{{ config('settings.company_name') }}
{{ config('settings.company_address.street') }}
{{ config('settings.company_address.zip_code') }} {{ config('settings.company_address.city') }}
{{ config('settings.company_address.voivodeship') }}