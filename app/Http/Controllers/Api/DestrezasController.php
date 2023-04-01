<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Destrezas;
use App\Http\Resources\DestrezasResource;

class DestrezasController extends BaseController
{
    public function index()
    {
        $data = Destrezas::all();
        return $this->sendResponse(DestrezasResource::collection($data), 'Destrezas recuperados correctamente');
    }

    public function store(Request $request){
        $data = new Destrezas();
        $data->descripcion = $request->input('descripcion');
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        $data->maximo = $request->input('maximo');
        $data->minimo = $request->input('minimo');
        $data->sexo = $request->input('sexo');
        $data->idanio = $request->input('idanio');
        $data->save();

        return $this->sendResponse(new DestrezasResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Destrezas::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        $data->maximo = $request->input('maximo');
        $data->minimo = $request->input('minimo');
        $data->sexo = $request->input('sexo');
        $data->idanio = $request->input('idanio');
        $data->save();
        return $this->sendResponse(new DestrezasResource($data), 'Destrezas editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Destrezas::find($id)->delete();

        return $this->sendResponse([], 'Destrezas eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Destrezas::find($id);
        if($data){
            return $this->sendResponse(new DestrezasResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
