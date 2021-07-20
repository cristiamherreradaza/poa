<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function registro()
    {
        return view('proyecto.registro');
    }
}
