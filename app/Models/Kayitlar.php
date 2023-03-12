<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kayitlar extends Model
{
    use HasFactory;
	protected $table = 'kayitlar';

    protected $fillable = [
        'name',
        'adet',
        'fiyat',
    ];
}
