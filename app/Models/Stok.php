<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['jumlah', 'menu_id'];

    protected $searchableFields = ['*'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
