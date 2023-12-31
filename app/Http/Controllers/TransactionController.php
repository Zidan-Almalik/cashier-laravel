<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Jenis;
use App\Models\Transaksis;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TransaksiRequest;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        $menu = Menu::with('jenis')->get();

        return view('app.transactions.index', compact('jenis', 'menu'));
    }

    public function tambahTransaksi(TransaksiRequest $request)
    {
        try {
            $validated = $request->validated();

            DB::beginTransaction();

            $transaksi = Transaksis::create([
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'total_harga' => $validated['total_harga'],
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'keterangan' => $validated['keterangan']
            ]);

            foreach ($validated['menu'] as $data) {
                TransaksiDetail::create([
                    'jumlah' => $data['jumlah'],
                    'menu_id' => $data['id'],
                    'sub_total' => $data['sub_total'],
                    'transaksis_id' => $transaksi->id
                ]);
            }

            DB::commit();

            return response()->json([
                'transaksi' => $transaksi,
                'message' => 'Transaksi berhasil ditambahkan'
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function faktur($id) {

        $transaksi = Transaksis::with('transaksiDetails')->findOrFail($id);
        $order =[
            'tanggal' => $transaksi->kode_masuk,
            'total' => $transaksi->total_harga,
            'metode_pembayaran' => $transaksi->metode_pembayaran,
            'keterangan' => $transaksi->keterangan,
            'details' => $transaksi->transaksiDetails
        ];
        return view('app.transactions.faktur', compact('order'));
    }


    public function data() {
        $data = Transaksis::all();

        return view('app.transactions.data', compact('data'));
    }

    public function edit(Transaksis $data) {
        return view ('app.transactions.edit', compact('data'));
    }

    public function update(Request $request, Transaksis $data) 
    {   
        $validator = Validator::make($request->all(), [
            'tanggal' => ['required', 'date'],
            'total_harga' => ['required', 'numeric'],
            'metode_pembayaran' => ['required', 'in:Cash,Qris'],
            'keterangan' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $validated = $validator->validated();
        
        $data->update($validated);

        return redirect()
        ->route('data.transaksi.edit', $data)
        ->withSuccess(__('crud.common.saved'));

    }
    public function destroy(Request $request, Transaksis $data)
    {
        $data->delete();

        return redirect()
        ->route('data.transaksi')
        ->withSuccess(__('crud.common.removed'));
    }
}
