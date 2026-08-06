<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query()
            ->with('category')
            ->when($request->filled('q'), fn ($q) => $q->where('name_fr', 'like', '%'.$request->string('q').'%'))
            ->orderBy('order')
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.form', [
            'product' => new Product(),
            'categories' => Category::query()->ordered()->get(),
        ]);
    }

    public function store(ProductRequest $request, ImageUploadService $images): RedirectResponse
    {
        $data = $request->safe()->except(['main_image', 'gallery', 'spec_labels', 'spec_values']);
        $data['specifications'] = $request->specifications();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $images->store($request->file('main_image'), 'products');
        }

        $product = Product::query()->create($data);

        $this->syncGallery($product, $request, $images);

        return redirect()->route('admin.products.index')->with('status', 'Produit créé avec succès.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', [
            'product' => $product->load('images'),
            'categories' => Category::query()->ordered()->get(),
        ]);
    }

    public function update(ProductRequest $request, Product $product, ImageUploadService $images): RedirectResponse
    {
        $data = $request->safe()->except(['main_image', 'gallery', 'spec_labels', 'spec_values']);
        $data['specifications'] = $request->specifications();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $images->replace($product->main_image, $request->file('main_image'), 'products');
        }

        $product->update($data);

        $this->syncGallery($product, $request, $images);

        return redirect()->route('admin.products.index')->with('status', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $product, ImageUploadService $images): RedirectResponse
    {
        $images->delete($product->main_image);

        foreach ($product->images as $image) {
            $images->delete($image->path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('status', 'Produit supprimé.');
    }

    public function destroyImage(Product $product, \App\Models\MediaImage $image, ImageUploadService $images): RedirectResponse
    {
        abort_unless($image->imageable_id === $product->id && $image->imageable_type === Product::class, 404);

        $images->delete($image->path);
        $image->delete();

        return back()->with('status', 'Image supprimée.');
    }

    private function syncGallery(Product $product, Request $request, ImageUploadService $images): void
    {
        if (! $request->hasFile('gallery')) {
            return;
        }

        $nextOrder = $product->images()->max('order') + 1;

        foreach ($request->file('gallery') as $index => $file) {
            $product->images()->create([
                'path' => $images->store($file, 'products/gallery'),
                'order' => $nextOrder + $index,
            ]);
        }
    }
}
