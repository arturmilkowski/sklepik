<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Order\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        $collection = $user->orders;

        return view('backend.user.order.index', [
            'collection' => $collection
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        Gate::authorize('view', Auth::user(), Order::class);

        return view('backend.user.order.show', [
            'item' => $order
        ]);
    }
}
