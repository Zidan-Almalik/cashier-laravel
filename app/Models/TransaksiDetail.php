<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiDetail extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['jumlah', 'sub_total', 'menu_id', 'transaksis_id'];

    protected $searchableFields = ['*'];

    protected $table = 'transaksi_details';

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function transaksis()
    {
        return $this->belongsTo(Transaksis::class);
    }
}
