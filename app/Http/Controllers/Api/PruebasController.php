<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Pruebas;
use App\Http\Resources\PruebasResource;

class PruebasController extends BaseController
{
    public function index()
    {
        $data = Pruebas::all();
        return $this->sendResponse(PruebasResource::collection($data), 'Pruebas recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Pruebas();
        $data->descripcion = $request->input('descripcion');
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio');
        
        $data->save();
        
        return $this->sendResponse(new PruebasResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Pruebas::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->valor = $request->input('valor');
        $data->promedio = $request->input('promedio'); 
        $data->save();
        return $this->sendResponse(new PruebasResource($data), 'Pruebas editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Pruebas::find($id)->delete();

        return $this->sendResponse([], 'Pruebas eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Pruebas::find($id);
        if($data){
            return $this->sendResponse(new PruebasResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
