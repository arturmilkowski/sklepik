<?php

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Product\Category;
use App\Http\Requests\Product\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $collection = Category::orderBy('name')->get();

        return view('backend.admin.product.category.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.product.category.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Category::create($validated);

        return redirect(route('backend.admins.products.categories.index'))->with('message', 'Dodano');
    }

    public function show(Category $category): View
    {
        return view('backend.admin.product.category.show', ['item' => $category]);
    }

    public function edit(Category $category): View
    {
        return view('backend.admin.product.category.edit', ['item' => $category]);
    }

    public function update(StoreCategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();
        $category->update($validated);

        return redirect(route('backend.admins.products.categories.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect(route('backend.admins.products.categories.index'))->with('message', 'Usunięto');
    }
}
