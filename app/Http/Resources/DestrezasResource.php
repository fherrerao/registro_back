<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Anio;
use App\Http\Resources\AnioResource;

class DestrezasResource extends JsonResource
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
            'descripcion' => $this->descripcion,
            'valor' => $this->valor,
            'promedio' => $this->promedio,
            'maximo' => $this->maximo,
            'minimo' => $this->minimo,
            'sexo' => $this->sexo,
            'anio' => new AnioResource(Anio::find($this->idanio)),            
        ];
    }
}
