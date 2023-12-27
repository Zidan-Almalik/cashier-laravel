<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_jenis', 'kategori_id'];

    protected $searchableFields = ['*'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
