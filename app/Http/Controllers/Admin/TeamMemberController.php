<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        return view('admin.team-members.index', [
            'members' => TeamMember::query()->orderBy('order')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.team-members.form', ['member' => new TeamMember()]);
    }

    public function store(Request $request, ImageUploadService $images): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $images->store($request->file('photo'), 'team');
        }

        TeamMember::query()->create($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Membre de l\'équipe créé avec succès.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.form', ['member' => $teamMember]);
    }

    public function update(Request $request, TeamMember $teamMember, ImageUploadService $images): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $images->replace($teamMember->photo, $request->file('photo'), 'team');
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Membre de l\'équipe mis à jour avec succès.');
    }

    public function destroy(TeamMember $teamMember, ImageUploadService $images): RedirectResponse
    {
        $images->delete($teamMember->photo);
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('status', 'Membre de l\'équipe supprimé.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_fr' => ['required', 'string', 'max:255'],
            'role_en' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}
