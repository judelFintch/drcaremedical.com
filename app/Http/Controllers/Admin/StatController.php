<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatController extends Controller
{
    public function index(): View
    {
        return view('admin.stats.index', [
            'stats' => Stat::query()->orderBy('order')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.stats.form', ['stat' => new Stat()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Stat::query()->create($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'Chiffre clé créé avec succès.');
    }

    public function edit(Stat $stat): View
    {
        return view('admin.stats.form', compact('stat'));
    }

    public function update(Request $request, Stat $stat): RedirectResponse
    {
        $stat->update($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'Chiffre clé mis à jour avec succès.');
    }

    public function destroy(Stat $stat): RedirectResponse
    {
        $stat->delete();

        return redirect()->route('admin.stats.index')->with('status', 'Chiffre clé supprimé.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'label_fr' => ['required', 'string', 'max:255'],
            'label_en' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string', 'max:50'],
            'icon' => ['nullable', 'string', 'max:100'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}
