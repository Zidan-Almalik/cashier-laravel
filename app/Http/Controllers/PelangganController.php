<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PelangganStoreRequest;
use App\Http\Requests\PelangganUpdateRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $pelanggans = Pelanggan::search($search)
            ->latest()
            ->get();

        return view('app.pelanggans.index', compact('pelanggans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        return view('app.pelanggans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelangganStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $pelanggan = Pelanggan::create($validated);

        return redirect()
            ->route('pelanggans.edit', $pelanggan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pelanggan $pelanggan): View
    {

        return view('app.pelanggans.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pelanggan $pelanggan): View
    {

        return view('app.pelanggans.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PelangganUpdateRequest $request,
        Pelanggan $pelanggan
    ): RedirectResponse {

        $validated = $request->validated();

        $pelanggan->update($validated);

        return redirect()
            ->route('pelanggans.edit', $pelanggan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pelanggan $pelanggan
    ): RedirectResponse {
        $pelanggan->delete();

        return redirect()
            ->route('pelanggans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
