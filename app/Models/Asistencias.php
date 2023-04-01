<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Cadete;

class Asistencias extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'asistencias';

    protected $fillable = [
        'fecha',
        'asiste',
        'idcadete'                   
    ];

    public function cadete()
    {
        return $this->belongsTo(Cadete::class, 'idcadete');
    }
}
