<?php

namespace App\Http\Controllers\Admin;

use App\Enums\QuoteRequestStatus;
use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QuoteRequestController extends Controller
{
    public function index(Request $request): View
    {
        $requests = QuoteRequest::query()
            ->with('product')
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.quote-requests.index', [
            'requests' => $requests,
            'statuses' => QuoteRequestStatus::cases(),
        ]);
    }

    public function show(QuoteRequest $quoteRequest): View
    {
        return view('admin.quote-requests.show', [
            'quoteRequest' => $quoteRequest->load('product'),
            'statuses' => QuoteRequestStatus::cases(),
        ]);
    }

    public function update(Request $request, QuoteRequest $quoteRequest): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::enum(QuoteRequestStatus::class)],
            'internal_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $quoteRequest->update($data);

        return back()->with('status', 'Demande de devis mise à jour avec succès.');
    }

    public function destroy(QuoteRequest $quoteRequest): RedirectResponse
    {
        if ($quoteRequest->attachment_path) {
            Storage::disk('local')->delete($quoteRequest->attachment_path);
        }

        $quoteRequest->delete();

        return redirect()->route('admin.quote-requests.index')->with('status', 'Demande de devis supprimée.');
    }

    public function downloadAttachment(QuoteRequest $quoteRequest): StreamedResponse
    {
        abort_unless($quoteRequest->attachment_path, 404);

        return Storage::disk('local')->download($quoteRequest->attachment_path);
    }
}
