<?php

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\Product;

class ProductImgController extends Controller
{
    private $filepath = 'public/images/products/';

    public function show(Product $product): View
    {
        return view('backend.admin.product.product.img.show', ['item' => $product]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        Storage::delete($this->filepath . $product->img);
        $product->update(['img' => null]);

        return redirect()
            ->route('backend.admins.products.products.show', $product)
            ->with('message', 'Usunięto');
    }
}
