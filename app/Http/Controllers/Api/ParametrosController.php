<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Parametros;
use App\Http\Resources\ParametrosResource;

class ParametrosController extends BaseController
{
    public function index()
    {
        $data = Parametros::all();
        return $this->sendResponse(ParametrosResource::collection($data), 'Parametros recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Parametros();
        $data->valor = $request->input('valor');
        $data->edad = $request->input('edad');
        $data->sexo = $request->input('sexo');
        $data->idpruebas = $request->input('idpruebas');       
        $data->save();
        
        return $this->sendResponse(new ParametrosResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Parametros::where('cedula', $id)->first();
        $data->valor = $request->input('valor');
        $data->edad = $request->input('edad');
        $data->sexo = $request->input('sexo');
        $data->idpruebas = $request->input('idpruebas');   
        $data->save();
        return $this->sendResponse(new ParametrosResource($data), 'Parametros editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Parametros::find($id)->delete();

        return $this->sendResponse([], 'Parametros eliminado correctamente.');
    }

    public function show($id)
    {        
        $data = Parametros::where('id', $id)->first();
        return $this->sendResponse(new ParametrosResource($data), '');        
    }
}
