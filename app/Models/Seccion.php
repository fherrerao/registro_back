<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Compania;

class Seccion extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'seccion';

    protected $fillable = [
        'descripcion',
        'idcompania'
    ];

    public function compania()
    {
        return $this->belongsTo(Compania::class, 'idcompania');
    }
}
