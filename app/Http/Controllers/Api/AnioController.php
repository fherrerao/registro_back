<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Anio;
use App\Http\Resources\AnioResource;

class AnioController extends BaseController
{
    public function index(){
        $data = Anio::all();
        return $this->sendResponse(AnioResource::collection($data), 'Anios recuperados correctamente');
    }

    public function store(Request $request){
        $data = new Anio();
        $data->descripcion = $request->input('descripcion');
        $data->notaminima = $request->input('notaminima');
        $data->save();

        return $this->sendResponse(new AnioResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Anio::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->notaminima = $request->input('notaminima');
        $data->save();
        return $this->sendResponse(new AnioResource($data), 'Anio editado correctamente.');
    }

    public function destroy($id)
    {
        $data = Anio::find($id)->delete();

        return $this->sendResponse([], 'Anio eliminado correctamente.');
    }   

    public function show($id)
    {
        $data = Anio::find($id);
        if($data){
            return $this->sendResponse(new AnioResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
