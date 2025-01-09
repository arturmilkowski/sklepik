<?php

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Product\Concentration;
use App\Http\Requests\Product\StoreConcentrationRequest;

class ConcentrationController extends Controller
{
    public function index(): View
    {
        $collection = Concentration::orderBy('name')->get();

        return view('backend.admin.product.concentration.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.product.concentration.create');
    }

    public function store(StoreConcentrationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Concentration::create($validated);

        return redirect(route('backend.admins.products.concentrations.index'))->with('message', 'Dodano');
    }

    public function show(Concentration $concentration)
    {
        return view('backend.admin.product.concentration.show', ['item' => $concentration]);
    }

    public function edit(Concentration $concentration): View
    {
        return view('backend.admin.product.concentration.edit', ['item' => $concentration]);
    }

    public function update(StoreConcentrationRequest $request, Concentration $concentration): RedirectResponse
    {
        $validated = $request->validated();
        $concentration->update($validated);

        return redirect(route('backend.admins.products.concentrations.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Concentration $concentration): RedirectResponse
    {
        $concentration->delete();

        return redirect(route('backend.admins.products.concentrations.index'))->with('message', 'Usunięto');
    }
}
