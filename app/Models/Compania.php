<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Anio;

class Compania extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'compania';

    protected $fillable = [
        'descripcion',
        'idanio'                
    ];

    public function anio()
    {
        return $this->belongsTo(Anio::class, 'idanio');
    }
}
