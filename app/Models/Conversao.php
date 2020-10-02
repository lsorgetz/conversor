<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversao extends Model
{
    use HasFactory;
    protected $table = 'conversoes';
    protected $fillable = [
        'data',
        'moeda1',
        'moeda2',
        'valor_converter',
        'valor_convertido',
    ];
}
