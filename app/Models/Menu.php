<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_menu', 'harga', 'deskripsi', 'image', 'jenis_id'];

    protected $searchableFields = ['*'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
