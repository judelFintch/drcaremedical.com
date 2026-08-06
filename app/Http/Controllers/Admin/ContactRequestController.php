<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContactRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactRequestController extends Controller
{
    public function index(Request $request): View
    {
        $requests = ContactRequest::query()
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.contact-requests.index', [
            'requests' => $requests,
            'statuses' => ContactRequestStatus::cases(),
        ]);
    }

    public function show(ContactRequest $contactRequest): View
    {
        return view('admin.contact-requests.show', [
            'contactRequest' => $contactRequest,
            'statuses' => ContactRequestStatus::cases(),
        ]);
    }

    public function update(Request $request, ContactRequest $contactRequest): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::enum(ContactRequestStatus::class)],
            'internal_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        if ($data['status'] === ContactRequestStatus::Processed->value && $contactRequest->status !== ContactRequestStatus::Processed) {
            $data['processed_at'] = now();
        }

        $contactRequest->update($data);

        return back()->with('status', 'Demande mise à jour avec succès.');
    }

    public function destroy(ContactRequest $contactRequest): RedirectResponse
    {
        $contactRequest->delete();

        return redirect()->route('admin.contact-requests.index')->with('status', 'Demande supprimée.');
    }
}
