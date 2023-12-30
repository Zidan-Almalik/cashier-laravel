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
                'message' => 'Transaksi berhasil ditambahkan'
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
