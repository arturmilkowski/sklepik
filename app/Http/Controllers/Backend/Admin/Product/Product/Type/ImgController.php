<?php

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\{Type, Product};

class ImgController extends Controller
{
    private $filepath = 'public/images/products/types/';

    public function show(Product $product, Type $type): View
    {
        return view('backend.admin.product.product.type.img.show', ['product' => $product, 'item' => $type]);
    }

    public function destroy(Product $product, Type $type): RedirectResponse
    {
        Storage::delete($this->filepath . $type->img);
        $type->update(['img' => null]);

        return redirect()
            ->route('backend.admins.products.types.show', [$product, $type])
            ->with('message', 'Usunięto');
    }
}
