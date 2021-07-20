<?php

namespace App\Http\Controllers;

use App\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function listado()
    {
        $partidas = Partida::all();

        return view('partida.listado')->with(compact('partidas'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('tipo_id') == null){
            // creamos un nuevo registro
            $tipo = new Partida();
        }else{
            // editamos un registro con su tipo_id
            $tipo = Partida::find($request->input('tipo_id'));
        }

        $tipo->nombre      = $request->input('nombre');
        $tipo->depende = $request->input('depende');
        $tipo->gestion = $request->input('gestion');
        $tipo->codigo = $request->input('codigo');
        $tipo->save();

        return redirect('Partida/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        Partida::destroy($tipo_id);
        return redirect('Partida/listado');
    }
}
