<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (! in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            abort(404);
        }

        $request->session()->put(SetLocale::SESSION_KEY, $locale);

        $redirect = redirect()->to(url()->previous() !== url()->current() ? url()->previous() : route('home'));

        return $redirect->withCookie(cookie()->forever(SetLocale::SESSION_KEY, $locale));
    }
}
