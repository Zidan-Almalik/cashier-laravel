<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meja extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nomor_meja', 'kapasitas', 'status'];

    protected $searchableFields = ['*'];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
