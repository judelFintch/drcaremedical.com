<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Realisation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $xml = Cache::remember('sitemap.xml', now()->addHour(), function () {
            $urls = [
                ['loc' => route('home'), 'priority' => '1.0'],
                ['loc' => route('about'), 'priority' => '0.8'],
                ['loc' => route('services'), 'priority' => '0.8'],
                ['loc' => route('catalog.index'), 'priority' => '0.9'],
                ['loc' => route('realisations.index'), 'priority' => '0.7'],
                ['loc' => route('partners.index'), 'priority' => '0.6'],
                ['loc' => route('contact.show'), 'priority' => '0.6'],
                ['loc' => route('quote.create'), 'priority' => '0.7'],
            ];

            foreach (Product::query()->published()->get() as $product) {
                $urls[] = ['loc' => route('catalog.show', $product), 'priority' => '0.7', 'lastmod' => $product->updated_at];
            }

            foreach (Realisation::query()->published()->get() as $realisation) {
                $urls[] = ['loc' => route('realisations.show', $realisation), 'priority' => '0.6', 'lastmod' => $realisation->updated_at];
            }

            return view('sitemap', ['urls' => $urls])->render();
        });

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
