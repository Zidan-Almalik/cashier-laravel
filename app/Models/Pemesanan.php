<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tanggal_pemesanan',
        'jam_mulai',
        'jam_selesai',
        'nama_pemesan',
        'jumlah_pelanggan',
        'meja_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tanggal_pemesanan' => 'date',
    ];

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}
