<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Star;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class StarController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('stars.index', [
            'stars' => Star::with('user')->latest()->get(),
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('stars.create', []);
    }

    public function store(Request $request, FileUploadController $fileUpload): Redirector|Application|RedirectResponse
    {
        $request->merge(['first_name' => ucfirst(strtolower($request->get('first_name')))]);
        $request->merge(['last_name' => ucfirst(strtolower($request->get('last_name')))]);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'file' => 'required|mimes:jpg,png|max:2048',
        ]);

        $star = $request->user()->stars()->create($validated);

        $fileUpload->fileUpload($request, $star->id);

        return redirect(route('stars.index'));
    }

    public function edit(Star $star): Factory|View|Application
    {
        $file = File::find($star->file_id);

        return view('stars.edit', [
            'star' => $star,
            'file' => $file,
        ]);
    }

    public function update(Request $request, Star $star, FileUploadController $fileUpload): Redirector|Application|RedirectResponse
    {
        $request->merge(['first_name' => ucfirst(strtolower($request->get('first_name')))]);
        $request->merge(['last_name' => ucfirst(strtolower($request->get('last_name')))]);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'file' => 'mimes:jpg,png|max:2048',          //file is not required for update
        ]);

        $star->update($validated);

        $fileUpload->fileUpload($request, $star->id);

        return redirect(route('stars.index'));
    }

    public function destroy(Star $star): Redirector|Application|RedirectResponse
    {
        $this->authorize('delete', $star);

        $star->delete();

        return redirect(route('stars.index'));
    }

    public function getStar(string $id): JsonResponse
    {
        $star = Star::find((int) $id);

        $file = File::find($star->file_id);

        return new JsonResponse(['star' => $star, 'file' => $file], 200);
    }
}
