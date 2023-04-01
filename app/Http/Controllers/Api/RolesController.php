<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Roles;
use App\Http\Resources\RolesResource;

class RolesController extends BaseController
{
    public function index()
    {
        $data = Roles::all();
        return $this->sendResponse(RolesResource::collection($data), 'Roles recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Roles();
        $data->descripcion = $request->input('descripcion');       
        
        $data->save();
        
        return $this->sendResponse(new RolesResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Roles::find($id);
        $data->descripcion = $request->input('descripcion');
        $data->save();
        return $this->sendResponse(new RolesResource($data), 'Roles editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Roles::find($id)->delete();

        return $this->sendResponse([], 'Roles eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Roles::find($id);
        if($data){
            return $this->sendResponse(new RolesResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }
}
