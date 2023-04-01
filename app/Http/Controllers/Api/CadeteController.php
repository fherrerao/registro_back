<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\Cadete;
use App\Http\Resources\CadeteResource;

class CadeteController extends BaseController
{
    public function index()
    {
        $data = Cadete::all();
        return $this->sendResponse(CadeteResource::collection($data), 'Cadete recuperados correctamente');
    }

    public function store(Request $request)
    {
        $data = new Cadete();
        $data->cedula = $request->input('cedula');
        $data->nombres = $request->input('nombres');
        $data->apellidos = $request->input('apellidos');
        $data->edad = $request->input('edad');
        $data->genero = $request->input('genero');
        $data->especialista = $request->input('especialista');
        $data->fec_nac = $request->input('fec_nac');
        $data->idpeloton = $request->input('idpeloton');
        $data->save();
        
        return $this->sendResponse(new CadeteResource($data), 'Creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $data = Cadete::where('cedula', $id)->first();
        $data->cedula = $request->input('cedula');
        $data->nombres = $request->input('nombres');
        $data->apellidos = $request->input('apellidos');
        $data->edad = $request->input('edad');
        $data->genero = $request->input('genero');
        $data->especialista = $request->input('especialista');
        $data->fec_nac = $request->input('fec_nac');
        $data->idpeloton = $request->input('idpeloton');
        $data->save();
        return $this->sendResponse(new CadeteResource($data), 'Cadete Editado Correctamente.');
    }

    public function destroy($id)
    {
        $data = Cadete::find($id)->delete();

        return $this->sendResponse([], 'Cadete eliminado correctamente.');
    }

    public function show($id)
    {
        $data = Cadete::where('cedula', $id)->first();

        if($data){
            return $this->sendResponse(new CadeteResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }

    public function find($id)
    {
        $date = Carbon::now();
        $date_in = Carbon::parse('2021-03-25');
        echo $date_in;
        $data = Cadete::where('cedula', $id)->first();
        
        if($data){
            return $this->sendResponse(new CadeteResource($data), '');
        }else{
            return $this->sendResponse(['No encontrado'],'');
        }
    }

    public function getByPeloton($idpeloton, $idparametros, $bimestre){
        $data = Cadete::leftJoin('calificaciones', 'cadete.id', '=', 'calificaciones.idcadete')
        ->leftJoin('registros', 'calificaciones.id', '=', 'registros.idcalificaciones')
        ->where('cadete.idpeloton', $idpeloton)
        ->where('registros.idparametros', $idparametros)
        ->where('calificaciones.bimestre', $bimestre)
        ->get();

        return $data;
    }
}
