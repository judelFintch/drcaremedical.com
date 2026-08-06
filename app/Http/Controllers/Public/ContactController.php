<?php

namespace App\Http\Controllers\Public;

use App\Enums\ContactNeedType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\ContactRequestStoreRequest;
use App\Models\Agency;
use App\Services\ContactRequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact.show', [
            'agencies' => Agency::query()->published()->ordered()->get(),
            'needTypes' => ContactNeedType::cases(),
        ]);
    }

    public function store(ContactRequestStoreRequest $request, ContactRequestService $service): RedirectResponse
    {
        $service->submit($request->safe()->except(['website', 'consent']));

        return redirect()
            ->route('contact.show')
            ->with('status', __('forms.contact_success'));
    }
}
