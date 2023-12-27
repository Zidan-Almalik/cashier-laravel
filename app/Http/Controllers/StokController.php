<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Menu;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StokStoreRequest;
use App\Http\Requests\StokUpdateRequest;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $stoks = Stok::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.stoks.index', compact('stoks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        $menus = Menu::pluck('nama_menu', 'id');

        return view('app.stoks.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StokStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $stok = Stok::create($validated);

        return redirect()
            ->route('stoks.edit', $stok)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Stok $stok): View
    {

        return view('app.stoks.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Stok $stok): View
    {

        $menus = Menu::pluck('nama_menu', 'id');

        return view('app.stoks.edit', compact('stok', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        StokUpdateRequest $request,
        Stok $stok
    ): RedirectResponse {

        $validated = $request->validated();

        $stok->update($validated);

        return redirect()
            ->route('stoks.edit', $stok)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Stok $stok): RedirectResponse
    {

        $stok->delete();

        return redirect()
            ->route('stoks.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
