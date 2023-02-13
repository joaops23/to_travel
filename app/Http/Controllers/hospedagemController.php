<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\hospedagemModel as Hosp;

class hospedagemController extends Controller
{
    public function adicionar(Request $request) {

    }
    
    public function listagem(Request $request) {
        $id = Auth::user()->id;

        // buscar e listar todas as hospedagens cadastradas pelo usuário logado, e enviar para a view
        $list = Hosp::where('userId', '=', $id)->get();

        return view('site.hospList', ['hospedagens' => $list]);
    }
}
