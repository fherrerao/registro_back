<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Peloton;
use App\Http\Resources\PelotonResource;

class PelotonController extends BaseController
{
    public function index()
    {
        $data = Peloton::all();
        return $this->sendResponse(PelotonResource::collection($data), 'Peloton recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Peloton();
        $data->descripcion = $request->input('descripcion');
        $data->idseccion = $request->input('idseccion');
        $data->iddocente = $request->input('iddocente');
        
        $data->save();
        
        return $this->sendResponse(new PelotonResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Peloton::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->idseccion = $request->input('idseccion');  
        $data->iddocente = $request->input('iddocente');  
        $data->save();
        return $this->sendResponse(new PelotonResource($data), 'Peloton editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Peloton::find($id)->delete();

        return $this->sendResponse([], 'Peloton eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Peloton::find($id);
        if($data){
            return $this->sendResponse(new PelotonResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
