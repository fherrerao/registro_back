<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Pruebas;
use App\Http\Resources\PruebasResource;

class ParametrosResource extends JsonResource
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
            'edad' => $this->edad,                      
            'sexo' => $this->sexo,
            'pruebas' => new PruebasResource(Pruebas::find($this->idpruebas))
        ];
    }
}
