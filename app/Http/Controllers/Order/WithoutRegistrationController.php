<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Order\StoreWithoutRegisterRequest;
use App\Services\Cart;
use App\Models\Geo\Voivodeship;
use App\Models\Order\{SaleDocument, Order};
use App\Models\Customer\Customer;
use App\Events\Order\PlacedWithoutRegistration;

class WithoutRegistrationController extends Controller
{
    public function create(Cart $cart): View | RedirectResponse
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $deliveryName = config('settings.delivery.polish_post_office.name');
        $deliveryMethod = config('settings.delivery.polish_post_office.methods.registered_letter');
        $productsCount = $cart->itemsCount();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $totalPriceAndDeliveryCost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $voivodeships = Voivodeship::all();
        $saleDocuments = SaleDocument::all();

        return view('order.without-registration', [
            'cart' => $cart,
            'deliveryName' => $deliveryName,
            'deliveryMethod' => $deliveryMethod,
            'deliveryCost' => $deliveryCost,
            'totalPriceAndDeliveryCost' => $totalPriceAndDeliveryCost,
            'voivodeships' => $voivodeships,
            'saleDocuments' => $saleDocuments,
        ]);
    }

    public function store(StoreWithoutRegisterRequest $request, Cart $cart): RedirectResponse
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $validated = $request->validated();

        $customer = new Customer();
        $createdCustomer = $customer->create($validated);

        $order = new Order();
        $productsCount = $cart->itemsCount();
        $order->total_price = $cart->totalPrice();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $order->delivery_cost = $deliveryCost;
        $order->total_price_and_delivery_cost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $order->delivery_name = config('settings.delivery.polish_post_office.name');
        $order->sale_document_id = $request->sale_document_id;
        $order->comment = $request->input('comment');
        $savedOrder = $createdCustomer->order()->save($order);
        $items = $cart->getItems();
        $savedOrder->items()->saveMany($items);
        $cart->decreaseProductTypeQuantity($items);

        PlacedWithoutRegistration::dispatch($cart, $order, $createdCustomer);
        $cart->clear();

        return redirect()->route('orders.thank.without-registration');
    }
}
