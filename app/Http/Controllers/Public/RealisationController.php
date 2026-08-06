<?php

namespace App\Http\Controllers\Public;

use App\Enums\PublicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RealisationController extends Controller
{
    public function index(Request $request): View
    {
        $realisations = Realisation::query()
            ->published()
            ->when($request->filled('city'), fn ($query) => $query->where('city', $request->string('city')))
            ->recent()
            ->paginate(9)
            ->withQueryString();

        return view('realisations.index', [
            'realisations' => $realisations,
            'cities' => Realisation::query()->published()->distinct()->pluck('city')->filter()->sort()->values(),
        ]);
    }

    public function show(Realisation $realisation): View
    {
        abort_unless($realisation->status === PublicationStatus::Published, 404);

        return view('realisations.show', [
            'realisation' => $realisation->load('images'),
        ]);
    }
}
