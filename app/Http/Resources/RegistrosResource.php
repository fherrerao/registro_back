<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Parametros;
use App\Http\Resources\ParametrosResource;
use App\Models\Destrezas;
use App\Http\Resources\DestrezasResource;
use App\Models\Calificaciones;
use App\Http\Resources\CalificacionesResource;

class RegistrosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'valor' => $this->valor,                      
            'promedio' => $this->promedio,                                  
            'parametros' => new ParametrosResource(Parametros::find($this->idparametros)),
            'destrezas' => new DestrezasResource(Destrezas::find($this->iddestrezas)),
            'calificaciones' => new CalificacionesResource(Calificaciones::find($this->idcalificaciones)),
        ];
    }
}
