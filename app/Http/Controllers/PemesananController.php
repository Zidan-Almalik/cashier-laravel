<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pemesanan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PemesananStoreRequest;
use App\Http\Requests\PemesananUpdateRequest;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $pemesanans = Pemesanan::search($search)
            ->latest()
            ->get();
        return view('app.pemesanans.index', compact('pemesanans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        $mejas = Meja::pluck('id', 'id');

        return view('app.pemesanans.create', compact('mejas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemesananStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $pemesanan = Pemesanan::create($validated);

        return redirect()
            ->route('pemesanans.edit', $pemesanan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pemesanan $pemesanan): View
    {
        return view('app.pemesanans.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pemesanan $pemesanan): View
    {

        $mejas = Meja::pluck('id', 'id');

        return view('app.pemesanans.edit', compact('pemesanan', 'mejas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PemesananUpdateRequest $request,
        Pemesanan $pemesanan
    ): RedirectResponse {

        $validated = $request->validated();

        $pemesanan->update($validated);

        return redirect()
            ->route('pemesanans.edit', $pemesanan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pemesanan $pemesanan
    ): RedirectResponse {

        $pemesanan->delete();

        return redirect()
            ->route('pemesanans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
