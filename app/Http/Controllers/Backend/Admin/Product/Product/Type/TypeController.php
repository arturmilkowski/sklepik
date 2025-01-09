<?php

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\{Product, Type, Size};
use App\Services\File;
use App\Http\Requests\Product\StoreTypeRequest;

class TypeController extends Controller
{
    private $filepath = 'public/images/products/types/';

    public function index(Product $product)
    {
        return view('backend.admin.product.product.type.index', [
            'product' => $product,
            'collection' => $product->types
        ]);
    }

    public function create(Product $product): View
    {
        $sizes = Size::orderBy('name')->get();
        $products = Product::latest()->get();

        return view('backend.admin.product.product.type.create', [
            'sizes' => $sizes,
            'products' => $products,
            'product' => $product
        ]);
    }

    public function store(StoreTypeRequest $request, Product $product)
    {
        $validated = $request->validated();
        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $validated['slug'] . '.' . $extension;
            File::store($request, $this->filepath, $filename);
            $validated['img'] = $filename;
        }

        Type::create($validated);

        return redirect(route('backend.admins.products.types.index', $product))->with('message', 'Dodano');
    }

    public function show(Product $product, Type $type)
    {
        return view('backend.admin.product.product.type.show', [
            'product' => $product,
            'item' => $type
        ]);
    }

    public function edit(Product $product, Type $type): View
    {
        $sizes = Size::orderBy('name')->get();
        $products = Product::latest()->get();

        return view('backend.admin.product.product.type.edit', [
            'sizes' => $sizes,
            'products' => $products,
            'product' => $product,
            'item' => $type
        ]);
    }

    public function update(StoreTypeRequest $request, Product $product, Type $type): RedirectResponse
    {
        $validated = $request->validated();
        $slug = Str::slug($validated['name']);
        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $slug . '.' . $extension;
            $success = File::update($request, $type->img, $this->filepath, $filename);
            if ($success) {
                $validated['img'] = $filename; // assign new path
            }
        }
        $type->update($validated);

        return redirect(route('backend.admins.products.types.show', [$product, $type]))->with('message', 'Zmieniono');
    }

    public function destroy(Product $product, Type $type): RedirectResponse
    {
        if ($type->img) {
            Storage::delete($this->filepath . $type->img);
        }
        $type->delete();

        return redirect(route('backend.admins.products.types.index', [$product, $type]))->with('message', 'Usunięto');
    }
}
