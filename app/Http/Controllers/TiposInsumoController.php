<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TiposInsumo;

class TiposInsumoController extends Controller
{
    public function listado()
    {
        $tiposInsumos = TiposInsumo::all();

        return view('tipos_insumos.listado')->with(compact('tiposInsumos'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('tipo_id') == null){
            // creamos un nuevo registro
            $tipo = new TiposInsumo();
        }else{
            // editamos un registro con su tipo_id
            $tipo = TiposInsumo::find($request->input('tipo_id'));
        }

        $tipo->nombre      = $request->input('nombre');
        $tipo->abreviatura = $request->input('abreviatura');
        $tipo->save();

        return redirect('TiposInsumo/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        TiposInsumo::destroy($tipo_id);
        return redirect('TiposInsumo/listado');
    }
}
