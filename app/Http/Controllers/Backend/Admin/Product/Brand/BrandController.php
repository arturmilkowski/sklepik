<?php

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Product\StoreBrandRequest;

class BrandController extends Controller
{
    public function index(): View
    {
        $collection = Brand::orderBy('name')->get();

        return view('backend.admin.product.brand.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.product.brand.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Brand::create($validated);

        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Dodano');
    }

    public function show(Brand $brand): View
    {
        return view('backend.admin.product.brand.show', ['item' => $brand]);
    }

    public function edit(Brand $brand): View
    {
        return view('backend.admin.product.brand.edit', ['item' => $brand]);
    }

    public function update(StoreBrandRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();
        $brand->update($validated);

        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Usunięto');
    }
}
