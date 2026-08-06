<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\TeamMember;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.about', [
            'team' => TeamMember::query()->published()->ordered()->get(),
            'agencies' => Agency::query()->published()->ordered()->get(),
        ]);
    }
}
