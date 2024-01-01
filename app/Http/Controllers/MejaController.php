<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MejaStoreRequest;
use App\Http\Requests\MejaUpdateRequest;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $mejas = Meja::search($search)
            ->latest()
            ->get();

        return view('app.mejas.index', compact('mejas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('app.mejas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MejaStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $meja = Meja::create($validated);

        return redirect()
            ->route('mejas.edit', $meja)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Meja $meja): View
    {
        return view('app.mejas.show', compact('meja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Meja $meja): View
    {

        return view('app.mejas.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MejaUpdateRequest $request,
        Meja $meja
    ): RedirectResponse {

        $validated = $request->validated();

        $meja->update($validated);

        return redirect()
            ->route('mejas.edit', $meja)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Meja $meja): RedirectResponse
    {

        $meja->delete();

        return redirect()
            ->route('mejas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
