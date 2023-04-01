<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Compania;
use App\Http\Resources\CompaniaResource;

class CompaniaController extends BaseController
{
    public function index()
    {
        $data = Compania::all();
        return $this->sendResponse(CompaniaResource::collection($data), 'Companias recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Compania();
        $data->descripcion = $request->input('descripcion');
        $data->idanio = $request->input('idanio');
        
        $data->save();
        
        return $this->sendResponse(new CompaniaResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Compania::find($id);
        $data->desccompa = $request->input('desccompa');
        $data->idanio = $request->input('idanio');
        $data->save();
        return $this->sendResponse(new CompaniaResource($data), 'Compania editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Compania::find($id)->delete();

        return $this->sendResponse([], 'Compania eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Compania::find($id);
        if($data){
            return $this->sendResponse(new CompaniaResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
