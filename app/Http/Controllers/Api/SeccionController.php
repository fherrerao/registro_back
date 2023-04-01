<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Seccion;
use App\Http\Resources\SeccionResource;

class SeccionController extends BaseController
{
    public function index()
    {
        $data = Seccion::all();
        return $this->sendResponse(SeccionResource::collection($data), 'Seccion recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Seccion();
        $data->descripcion = $request->input('descripcion');
        $data->idcompania = $request->input('idcompania');        
        
        $data->save();
        
        return $this->sendResponse(new SeccionResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Seccion::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->idcompania = $request->input('idcompania'); 
        $data->save();
        return $this->sendResponse(new SeccionResource($data), 'Seccion editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Seccion::find($id)->delete();

        return $this->sendResponse([], 'Seccion eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Seccion::find($id);
        if($data){
            return $this->sendResponse(new SeccionResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
