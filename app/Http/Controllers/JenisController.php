<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JenisStoreRequest;
use App\Http\Requests\JenisUpdateRequest;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $allJenis = Jenis::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_jenis.index', compact('allJenis', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        $kategoris = Kategori::pluck('nama', 'id');

        return view('app.all_jenis.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $jenis = Jenis::create($validated);

        return redirect()
            ->route('all-jenis.edit', $jenis)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Jenis $jenis): View
    {

        return view('app.all_jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Jenis $jenis): View
    {

        $kategoris = Kategori::pluck('nama', 'id');

        return view('app.all_jenis.edit', compact('jenis', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        JenisUpdateRequest $request,
        Jenis $jenis
    ): RedirectResponse {

        $validated = $request->validated();

        $jenis->update($validated);

        return redirect()
            ->route('all-jenis.edit', $jenis)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Jenis $jenis): RedirectResponse
    {

        $jenis->delete();

        return redirect()
            ->route('all-jenis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
