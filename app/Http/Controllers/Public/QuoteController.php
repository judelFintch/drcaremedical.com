<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\QuoteRequestStoreRequest;
use App\Models\Product;
use App\Services\QuoteRequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function create(Request $request): View
    {
        $product = null;

        if ($request->filled('product')) {
            $product = Product::query()->published()->where('slug', $request->string('product'))->first();
        }

        return view('quote.create', ['product' => $product]);
    }

    public function store(QuoteRequestStoreRequest $request, QuoteRequestService $service): RedirectResponse
    {
        $service->submit(
            $request->safe()->except(['website', 'consent', 'attachment']),
            $request->file('attachment')
        );

        return redirect()
            ->route('quote.create')
            ->with('status', __('forms.quote_success'));
    }
}
