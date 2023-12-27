<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksis extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tanggal',
        'total_harga',
        'metode_pembayaran',
        'keterangan',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
