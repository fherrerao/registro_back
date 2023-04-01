<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Peloton;
use App\Http\Resources\PelotonResource;

class CadeteResource extends JsonResource
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
            'cedula' => $this->cedula,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'genero' => $this->genero,
            'especialista' => $this->especialista,
            'fec_nac' => $this->fec_nac,            
            'peloton' => new PelotonResource(Peloton::find($this->idpeloton))
        ];
    }
}
