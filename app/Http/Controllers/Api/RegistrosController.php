<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Registros;
use App\Http\Resources\RegistrosResource;

class RegistrosController extends BaseController
{
    public function index()
    {
        $data = Registros::all();
        return $this->sendResponse(RegistrosResource::collection($data), 'Registros recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Registros();
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        $data->idparametros = $request->input('idparametros');
        $data->iddestrezas = $request->input('iddestrezas');
        $data->idcalificaciones = $request->input('idcalificaciones');
        
        $data->save();
        
        return $this->sendResponse(new RegistrosResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Registros::find($id);
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        $data->idparametros = $request->input('idparametros');
        $data->iddestrezas = $request->input('iddestrezas');
        $data->idcalificaciones = $request->input('idcalificaciones');
        $data->save();
        return $this->sendResponse(new RegistrosResource($data), 'Registros editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Registros::find($id)->delete();

        return $this->sendResponse([], 'Registros eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Registros::find($id);
        if($data){
            return $this->sendResponse(new RegistrosResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
