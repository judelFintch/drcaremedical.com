<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgencyController extends Controller
{
    public function index(): View
    {
        return view('admin.agencies.index', [
            'agencies' => Agency::query()->orderBy('order')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.agencies.form', ['agency' => new Agency()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Agency::query()->create($this->validated($request));

        return redirect()->route('admin.agencies.index')->with('status', 'Agence créée avec succès.');
    }

    public function edit(Agency $agency): View
    {
        return view('admin.agencies.form', compact('agency'));
    }

    public function update(Request $request, Agency $agency): RedirectResponse
    {
        $agency->update($this->validated($request));

        return redirect()->route('admin.agencies.index')->with('status', 'Agence mise à jour avec succès.');
    }

    public function destroy(Agency $agency): RedirectResponse
    {
        $agency->delete();

        return redirect()->route('admin.agencies.index')->with('status', 'Agence supprimée.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'city' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'hours' => ['nullable', 'string', 'max:255'],
            'lat' => ['nullable', 'numeric', 'between:-90,90'],
            'lng' => ['nullable', 'numeric', 'between:-180,180'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}
