<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\TeamMember;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function __invoke(): View
    {
        return view('partners.index', [
            'partners' => Partner::query()->published()->ordered()->get(),
            'team' => TeamMember::query()->published()->ordered()->get(),
        ]);
    }
}
