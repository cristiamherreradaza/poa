<?php

namespace App\Http\Controllers;

use App\TiposGasto;
use Illuminate\Http\Request;

class TiposGastoController extends Controller
{
    public function listado()
    {
        $tiposgastos = TiposGasto::all();

        return view('tipos_gastos.listado')->with(compact('tiposgastos'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('tipo_id') == null){
            // creamos un nuevo registro
            $tipo = new TiposGasto();
        }else{
            // editamos un registro con su tipo_id
            $tipo = TiposGasto::find($request->input('tipo_id'));
        }

        $tipo->nombre      = $request->input('nombre');
        $tipo->save();

        return redirect('TiposGasto/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        TiposGasto::destroy($tipo_id);
        return redirect('TiposGasto/listado');
    }
}
