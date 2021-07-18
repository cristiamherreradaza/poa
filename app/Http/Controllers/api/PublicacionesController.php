<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function listado()
    {
        $usuarios = User::get();
        // dd($usuarios);
        return response()->json($usuarios);
    }
}
