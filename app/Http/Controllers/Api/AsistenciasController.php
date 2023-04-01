<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Asistencias;
use App\Http\Resources\AsistenciasResource;

class AsistenciasController extends BaseController
{
    public function index()
    {
        $data = Asistencias::all();
        return $this->sendResponse(AsistenciasResource::collection($data), 'Asistencias recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Asistencias();
        $data->fecha = $request->input('fecha');
        $data->asiste = $request->input('asiste');
        $data->idcadete = $request->input('idcadete');        
        
        $data->save();
        
        return $this->sendResponse(new AsistenciasResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Asistencias::find($id);
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        $data->idparametros = $request->input('idparametros');
        $data->iddestrezas = $request->input('iddestrezas');
        $data->idcalificaciones = $request->input('idcalificaciones');
        $data->save();
        return $this->sendResponse(new AsistenciasResource($data), 'Asistencias editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Asistencias::find($id)->delete();

        return $this->sendResponse([], 'Asistencias eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Asistencias::find($id);
        if($data){
            return $this->sendResponse(new AsistenciasResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
