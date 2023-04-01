<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Cadete;
use App\Http\Resources\CadeteResource;
use App\Models\Anio;
use App\Http\Resources\AnioResource;

class CalificacionesResource extends JsonResource
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
            'bimestre' => $this->bimestre,                      
            'pruebas' => $this->pruebas,                      
            'destrezas' => $this->destrezas,                      
            'nota' => $this->nota,                      
            'supletorio' => $this->supletorio,                      
            'cadete' => new CadeteResource(Cadete::find($this->idcadete)),
            'anio' => new AnioResource(Anio::find($this->idanio))
        ];
    }
}
