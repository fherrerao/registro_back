<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Roles;
use App\Http\Resources\RolesResource;

class DocenteResource extends JsonResource
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
            'correo' => $this->correo,                                  
            'clave' => $this->clave,                                  
            'claveTemp' => $this->claveTemp,                                  
            'estado' => $this->estado,                                  
            'rol' => new RolesResource(Roles::find($this->idrol)),            
        ];
    }
}
