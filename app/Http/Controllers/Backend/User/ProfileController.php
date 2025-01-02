<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Profile;
use App\Models\Geo\Voivodeship;
use App\Services\Cart;
use App\Http\Requests\User\StoreProfileRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $voivodeships = Voivodeship::all();

        return view('backend.user.profile.create', [
            'voivodeships' => $voivodeships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProfileRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Profile::create($validated);

        return redirect(route('backend.users.profiles.show'))->with('message', 'Dodano');
    }

    /**
     * Display the specified resource.
     *
     * @param Cart $cart
     * @return View
     */
    public function show(Cart $cart): View
    {
        $user = Auth::user();
        $hasCart = !$cart->isEmpty();

        if ($user->profile == null) {
            return view('backend.user.profile.complete');
        }

        return view('backend.user.profile.show', ['hasCart' => $hasCart, 'item' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProfileRequest $request
     * @return RedirectResponse
     */
    public function update(StoreProfileRequest $request): RedirectResponse
    {

        $validated = $request->validated();
        $request->user()->profile->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
