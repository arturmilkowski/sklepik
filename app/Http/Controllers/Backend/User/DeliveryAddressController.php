<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Geo\Voivodeship;
use App\Models\User\DeliveryAddress;
use App\Http\Requests\User\StoreDeliveryAddressRequest;

class DeliveryAddressController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $voivodeships = Voivodeship::all();
        $user = Auth::user();

        return view('backend.user.delivery-address.create', [
            'voivodeships' => $voivodeships,
            'item' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDeliveryAddressRequest $request
     * @return RedirectResponse
     */
    public function store(StoreDeliveryAddressRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        DeliveryAddress::create($validated);

        return redirect(route('backend.users.profiles.delivery-adresses.show'))->with('message', 'Dodano');
    }

    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(): View
    {
        $user = Auth::user();

        return view('backend.user.delivery-address.show', [
            'item' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(): View
    {
        $voivodeships = Voivodeship::all();
        $user = Auth::user();
        $item = $user->profile->DeliveryAddress;

        return view('backend.user.delivery-address.edit', [
            'voivodeships' => $voivodeships,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreDeliveryAddressRequest $request
     * @return RedirectResponse
     */
    public function update(StoreDeliveryAddressRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = Auth::user();
        $user->profile->deliveryAddress->update($validated);

        return redirect(route('backend.users.profiles.delivery-adresses.show'))->with('message', 'Zmieniono');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        $user = Auth::user();
        $user->profile->DeliveryAddress->delete();

        return redirect(route('backend.users.profiles.show'))->with('message', 'Usunięto');
    }
}
