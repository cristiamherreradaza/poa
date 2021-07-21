<?php

namespace App\Http\Controllers;

use App\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function listado()
    {
        $programas = Programa::all();

        return view('programas.listado')->with(compact('programas'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('programa_id') == null){
            // creamos un nuevo registro
            $tipo = new Programa();
        }else{
            // editamos un registro con su tipo_id
            $tipo = Programa::find($request->input('programa_id'));
        }

        $tipo->numero      = $request->input('numero');
        $tipo->nombre      = $request->input('nombre');
        $tipo->save();

        return redirect('Programa/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        Programa::destroy($tipo_id);
        return redirect('Programa/listado');
    }
}
