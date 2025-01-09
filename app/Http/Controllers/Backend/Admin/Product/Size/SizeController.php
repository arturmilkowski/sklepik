<?php

namespace App\Http\Controllers\Backend\Admin\Product\Size;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Product\Size;
use App\Http\Requests\Product\StoreSizeRequest;

class SizeController extends Controller
{
    public function index(): View
    {
        $collection = Size::orderBy('name')->get();

        return view('backend.admin.product.size.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.product.size.create');
    }

    public function store(StoreSizeRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Size::create($validated);

        return redirect(route('backend.admins.products.sizes.index'))->with('message', 'Dodano');
    }

    public function show(Size $size): View
    {
        return view('backend.admin.product.size.show', ['item' => $size]);
    }

    public function edit(Size $size): View
    {
        return view('backend.admin.product.size.edit', ['item' => $size]);
    }

    public function update(StoreSizeRequest $request, Size $size): RedirectResponse
    {
        $validated = $request->validated();
        $size->update($validated);

        return redirect(route('backend.admins.products.sizes.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Size $size): RedirectResponse
    {
        $size->delete();

        return redirect(route('backend.admins.products.sizes.index'))->with('message', 'Usunięto');
    }
}
