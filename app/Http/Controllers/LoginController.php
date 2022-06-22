<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registroInstancia(Request $request)
    {
        $msgErro = [];

        if (!$request->filled('instanciaId')) {
            $msgErro[] = 'instanciaId não recebido';
        }

        if (!$request->filled('token')) {
            $msgErro[] = 'Token não recebido';
        }

        if (!$request->filled('id')) {
            $msgErro[] = 'ID não recebido';
        }

        if (!$request->filled('urlCallback')) {
            $msgErro[] = 'urlCallback não recebida';
        }

        if (empty($msgErro)) {
            $request->session()->flush();
            $request->session()->put(['instancia' => $request->instanciaId]);

            return redirect('/login/sign-in?token=' . $request->token . '&id=' . $request->id . '&urlCallback=' . $request->urlCallback);
        } else {
            print_r($msgErro);
        }
    }

    public function signIn(Request $request)
    {
        $msgErro = [];

        if (!$request->filled('token')) {
            $msgErro[] = 'Token não recebido';
        }

        if (!$request->filled('id')) {
            $msgErro[] = 'ID não recebido';
        }

        if (!$request->filled('urlCallback')) {
            $msgErro[] = 'urlCallback não recebida';
        }

        if (empty($msgErro)) {
            $resValidaToken = ColaboradorController::validaTokenLogin($request);

            if (!$resValidaToken) {
                $msgErro[] = 'Não foi possível registrar o login';
            } else {
                $request->session()->put([
                    'colaboradorLogin' => ['id' => $request->id]
                ]);

                Colaborador::find($request->id)->update(['token' => null]);

                return redirect($request->urlCallback);
            }
        }

        if (!empty($msgErro)) {
            print_r($msgErro);
        }
    }
}
