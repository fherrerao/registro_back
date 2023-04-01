<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Calificaciones;
use App\Http\Resources\CalificacionesResource;

class CalificacionesController extends BaseController
{
    public function index()
    {
        $data = Calificaciones::all();
        return $this->sendResponse(CalificacionesResource::collection($data), 'Cadetes recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Calificaciones();
        $data->bimestre = $request->input('bimestre');
        $data->pruebas = $request->input('pruebas');
        $data->destrezas = $request->input('destrezas');
        $data->nota = $request->input('nota');
        $data->supletorio = $request->input('supletorio');
        $data->idcadete = $request->input('idcadete');
        $data->idanio = $request->input('idanio');
        
        $data->save();
        
        return $this->sendResponse(new CalificacionesResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Calificaciones::find($id);
        $data->bimestre = $request->input('bimestre');
        $data->nota = $request->input('pruebas');
        $data->nota = $request->input('destrezas');
        $data->nota = $request->input('nota');
        $data->nota = $request->input('supletorio');
        $data->idcadete = $request->input('idcadete');
        $data->idanio = $request->input('idanio');
        $data->save();
        return $this->sendResponse(new CalificacionesResource($data), 'Cadete editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Calificaciones::find($id)->delete();

        return $this->sendResponse([], 'Cadete eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Calificaciones::find($id);
        if($data){
            return $this->sendResponse(new CalificacionesResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }

}
