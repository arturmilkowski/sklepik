<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Cart;
use App\Models\Product\Type;

class StoreController extends Controller
{
    public function __invoke(Cart $cart, Type $type): RedirectResponse
    {
        $cart->add($type);

        return back();
    }
}
