<?php

namespace App\Http\Controllers\Public;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query()
            ->published()
            ->localStock()
            ->with('category')
            ->when($request->filled('category'), fn ($query) => $query->whereHas(
                'category',
                fn ($q) => $q->where('slug', $request->string('category'))
            ))
            ->when($request->filled('q'), function ($query) use ($request) {
                $search = '%'.$request->string('q').'%';
                $query->where(function ($q) use ($search) {
                    $q->where('name_fr', 'like', $search)
                        ->orWhere('name_en', 'like', $search)
                        ->orWhere('summary_fr', 'like', $search)
                        ->orWhere('summary_en', 'like', $search);
                });
            })
            ->ordered()
            ->paginate(9)
            ->withQueryString();

        return view('catalog.index', [
            'products' => $products,
            'categories' => Category::query()
                ->active()
                ->whereHas('products', fn ($query) => $query->published()->localStock())
                ->ordered()
                ->get(),
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->status === PublicationStatus::Published && $product->is_local_stock, 404);

        $related = Product::query()
            ->published()
            ->localStock()
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('catalog.show', [
            'product' => $product->load(['category', 'images']),
            'related' => $related,
        ]);
    }
}
