<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Cadete;
use App\Http\Resources\CadeteResource;

class AsistenciasResource extends JsonResource
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
            'fecha' => $this->fecha,                      
            'asiste' => $this->asiste,                      
            'cadete' => new CadeteResource(Cadete::find($this->idcadete))
        ];
    }
}
