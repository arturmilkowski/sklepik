<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

// use App\Services\Cart;

class DestroyAllController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): RedirectResponse
    {
        // $cart->removeAll();

        return back();
    }
}
