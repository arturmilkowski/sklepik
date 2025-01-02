<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\Cart;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Cart $cart): View
    {
        $user = Auth::user();
        $hasProfile = $user->profile;
        $hasCart = !$cart->isEmpty();

        return view('backend.user.dashboard', [
            'hasProfile' => $hasProfile,
            'hasCart' => $hasCart
        ]);
    }
}
