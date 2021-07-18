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
        // dd($request->all());
        $tipo              = new TiposInsumo();
        $tipo->nombre      = $request->input('nombre');
        $tipo->abreviatura = $request->input('abreviatura');
        $tipo->save();

        return redirect('TiposInsumo/listado');
    }
}
