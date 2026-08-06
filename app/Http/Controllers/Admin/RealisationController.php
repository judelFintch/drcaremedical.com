<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RealisationRequest;
use App\Models\MediaImage;
use App\Models\Realisation;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RealisationController extends Controller
{
    public function index(): View
    {
        return view('admin.realisations.index', [
            'realisations' => Realisation::query()->latest('realised_at')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.realisations.form', ['realisation' => new Realisation()]);
    }

    public function store(RealisationRequest $request, ImageUploadService $images): RedirectResponse
    {
        $data = $request->safe()->except(['main_image', 'gallery']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $images->store($request->file('main_image'), 'realisations');
        }

        $realisation = Realisation::query()->create($data);

        $this->syncGallery($realisation, $request, $images);

        return redirect()->route('admin.realisations.index')->with('status', 'Réalisation créée avec succès.');
    }

    public function edit(Realisation $realisation): View
    {
        return view('admin.realisations.form', ['realisation' => $realisation->load('images')]);
    }

    public function update(RealisationRequest $request, Realisation $realisation, ImageUploadService $images): RedirectResponse
    {
        $data = $request->safe()->except(['main_image', 'gallery']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $images->replace($realisation->main_image, $request->file('main_image'), 'realisations');
        }

        $realisation->update($data);

        $this->syncGallery($realisation, $request, $images);

        return redirect()->route('admin.realisations.index')->with('status', 'Réalisation mise à jour avec succès.');
    }

    public function destroy(Realisation $realisation, ImageUploadService $images): RedirectResponse
    {
        $images->delete($realisation->main_image);

        foreach ($realisation->images as $image) {
            $images->delete($image->path);
        }

        $realisation->delete();

        return redirect()->route('admin.realisations.index')->with('status', 'Réalisation supprimée.');
    }

    public function destroyImage(Realisation $realisation, MediaImage $image, ImageUploadService $images): RedirectResponse
    {
        abort_unless($image->imageable_id === $realisation->id && $image->imageable_type === Realisation::class, 404);

        $images->delete($image->path);
        $image->delete();

        return back()->with('status', 'Image supprimée.');
    }

    private function syncGallery(Realisation $realisation, Request $request, ImageUploadService $images): void
    {
        if (! $request->hasFile('gallery')) {
            return;
        }

        $nextOrder = $realisation->images()->max('order') + 1;

        foreach ($request->file('gallery') as $index => $file) {
            $realisation->images()->create([
                'path' => $images->store($file, 'realisations/gallery'),
                'order' => $nextOrder + $index,
            ]);
        }
    }
}
