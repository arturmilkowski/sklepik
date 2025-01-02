<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cart;
use App\Models\Order\SaleDocument;
use App\Models\Order\Order;
use App\Http\Requests\Order\StoreWithRegisterRequest;
use App\Events\Order\PlacedWithRegistration;

class WithRegistrationController extends Controller
{
    public function create(Request $request, Cart $cart)
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $deliveryName = config('settings.delivery.polish_post_office.name');
        $deliveryMethod = config('settings.delivery.polish_post_office.methods.registered_letter');
        $productsCount = $cart->itemsCount();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $totalPriceAndDeliveryCost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $saleDocuments = SaleDocument::all();
        $user = $request->user();

        if ($user->profile == null) {
            return view('backend.user.profile.complete');
        }

        return view('order.with-registration', [
            'cart' => $cart,
            'deliveryName' => $deliveryName,
            'deliveryMethod' => $deliveryMethod,
            'deliveryCost' => $deliveryCost,
            'totalPriceAndDeliveryCost' => $totalPriceAndDeliveryCost,
            'saleDocuments' => $saleDocuments,
            'user' => $user,
        ]);
    }

    public function store(Cart $cart, StoreWithRegisterRequest $request)
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $validated = $request->validated();
        $order = new Order();
        $productsCount = $cart->itemsCount();
        $order->total_price = $cart->totalPrice();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $order->delivery_cost = $deliveryCost;
        $order->total_price_and_delivery_cost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $order->delivery_name = config('settings.delivery.polish_post_office.name');
        $order->sale_document_id = $validated['sale_document_id'];
        $order->comment = $validated['comment'];

        $user = $request->user();
        $savedOrder = $user->orders()->save($order);
        $items = $cart->getItems();
        $savedOrder->items()->saveMany($items);
        $cart->decreaseProductTypeQuantity($items);

        PlacedWithRegistration::dispatch($cart, $savedOrder);
        $cart->clear();

        return redirect()->route('orders.thank.with-registration');
    }
}
