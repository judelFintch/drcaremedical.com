<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Realisation;
use App\Models\Stat;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.home', [
            'featuredProducts' => Product::query()->published()->featured()->with('category')->ordered()->take(6)->get(),
            'featuredRealisations' => Realisation::query()->published()->featured()->recent()->take(3)->get(),
            'partners' => Partner::query()->published()->ordered()->get(),
            'testimonials' => Testimonial::query()->published()->ordered()->get(),
            'stats' => Stat::query()->published()->ordered()->get(),
            'faqs' => Faq::query()->published()->ordered()->get(),
        ]);
    }
}
