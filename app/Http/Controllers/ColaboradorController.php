<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public static function validaTokenLogin($request)
    {
        $colaborador = Colaborador::where('id', $request->id)
            ->where('token', $request->token)
            ->first();

        if ($colaborador) {
            return true;
        } else {
            return false;
        }
    }
}
