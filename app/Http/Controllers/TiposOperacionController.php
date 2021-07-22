<?php

namespace App\Http\Controllers;

use App\TiposOperacion;
use Illuminate\Http\Request;

class TiposOperacionController extends Controller
{
    public function listado()
    {
        $tiposoperaciones = TiposOperacion::all();

        return view('tipos_operaciones.listado')->with(compact('tiposoperaciones'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('tipo_id') == null){
            // creamos un nuevo registro
            $tipo = new TiposOperacion();
        }else{
            // editamos un registro con su tipo_id
            $tipo = TiposOperacion::find($request->input('tipo_id'));
        }

        $tipo->nombre      = $request->input('nombre');
        $tipo->save();

        return redirect('TiposOperacion/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        TiposOperacion::destroy($tipo_id);
        return redirect('TiposOperacion/listado');
    }
}
