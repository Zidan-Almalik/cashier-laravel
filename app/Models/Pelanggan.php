<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama', 'email', 'nomor_telepon', 'alamat'];

    protected $searchableFields = ['*'];
}
