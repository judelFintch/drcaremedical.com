<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContactRequestStatus;
use App\Enums\PublicationStatus;
use App\Enums\QuoteRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactRequest;
use App\Models\Product;
use App\Models\QuoteRequest;
use App\Models\Realisation;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'publishedProductsCount' => Product::query()->where('status', PublicationStatus::Published)->count(),
            'categoriesCount' => Category::query()->count(),
            'realisationsCount' => Realisation::query()->where('status', PublicationStatus::Published)->count(),
            'newContactRequestsCount' => ContactRequest::query()->where('status', ContactRequestStatus::New)->count(),
            'newQuoteRequestsCount' => QuoteRequest::query()->where('status', QuoteRequestStatus::New)->count(),
            'recentContactRequests' => ContactRequest::query()->latest()->take(5)->get(),
            'recentQuoteRequests' => QuoteRequest::query()->latest()->take(5)->get(),
        ]);
    }
}
