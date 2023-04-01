<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Seccion;
use App\Models\Docente;
use App\Http\Resources\SeccionResource;
use App\Http\Resources\DocenteResource;

class PelotonResource extends JsonResource
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
            'seccion' => new SeccionResource(Seccion::find($this->idseccion)),
            'docente' => new DocenteResource(Docente::find($this->iddocente))
        ];
    }
}
