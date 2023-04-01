<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Docente;
use App\Http\Resources\DocenteResource;

class DocenteController extends BaseController
{
    public function index()
    {
        $data = Docente::all();
        return $this->sendResponse(DocenteResource::collection($data), 'Docente recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Docente();
        $data->cedula = $request->input('cedula');
        $data->nombres = $request->input('nombres');
        $data->apellidos = $request->input('apellidos');
        $data->correo = $request->input('correo');
        $data->clave = $request->input('clave');
        $data->claveTemp = $request->input('claveTemp');
        $data->estado = $request->input('estado');
        $data->idrol = $request->input('idrol');
        $data->save();
        
        return $this->sendResponse(new DocenteResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Docente::where('cedula', $id)->first();
        $data->cedula = $request->input('cedula');
        $data->nombres = $request->input('nombres');
        $data->apellidos = $request->input('apellidos');
        $data->correo = $request->input('correo');
        $data->clave = $request->input('clave');
        $data->claveTemp = $request->input('claveTemp');
        $data->estado = $request->input('estado');
        $data->idrol = $request->input('idrol');
        $data->save();
        return $this->sendResponse(new DocenteResource($data), 'Docente editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Docente::find($id)->delete();

        return $this->sendResponse([], 'Docente eliminado correctamente.');
    }

    public function show($id)
    {        
        $data = Docente::where('cedula', $id)->first();
        return $this->sendResponse(new DocenteResource($data), '');        
    }
}
