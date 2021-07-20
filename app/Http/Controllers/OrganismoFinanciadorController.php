<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrganismoFinanciador;

class OrganismoFinanciadorController extends Controller
{
    public function listado()
    {
        $organismo = OrganismoFinanciador::all();
        return view('organismo_financiador.listado')->with(compact('organismo'));
    }

    public function guarda(Request $request)
    {
        // preguntamos si tiene tipo id
        // para editar o crear un registro
        if($request->input('organismo_id') == null){
            // creamos un nuevo registro
            $organismo = new OrganismoFinanciador();
        }else{
            // editamos un registro con su tipo_id
            $organismo = OrganismoFinanciador::find($request->input('organismo_id'));
        }

        $organismo->descripcion  = $request->input('descripcion');
        $organismo->sigla = $request->input('sigla');
        $organismo->o_estado = $request->input('estado');
        $organismo->gestion  = $request->input('gestion');
        $organismo->codigo  = $request->input('codigo');
        $organismo->fecha  = $request->input('date');

        $organismo->save();

        return redirect('OrganismoFinanciador/listado');
    }

    public function elimina(Request $request, $tipo_id)
    {
        OrganismoFinanciador::destroy($tipo_id);
        return redirect('OrganismoFinanciador/listado');
    }
}
