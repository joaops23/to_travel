<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\hospedagemModel as Hosp;

class hospedagemController extends Controller
{
    public function cadastro(Request $request) 
    {
        $hosp = new Hosp();
        $dados = [];

        $dados['titulo'] = trim(htmlspecialchars($request->input('titulo')));
        $dados['descricao'] = trim(htmlspecialchars($request->input('descricao')));
        $dados['cep'] = str_replace('-', '', trim(htmlspecialchars($request->input('cep'))));
        $dados['endereco'] = trim(htmlspecialchars($request->input('endereco')));
        $dados['nrEndereco'] = trim(htmlspecialchars(intVal($request->input('numEndereco'))));
        $dados['complemento'] = trim(htmlspecialchars($request->input('complemento')));
        $dados['bairro'] = trim(htmlspecialchars($request->input('bairroEnd')));
        $dados['cidade'] = trim(htmlspecialchars($request->input('cidadeEnd')));
        $dados['uf'] = trim(htmlspecialchars($request->input('ufEnd')));
        $dados['userId'] = trim($request->input('userId'));

        //verifica se o formulário enviou o id da hospedagem, caso sim, alterar ao envés de incluir um novo
        if(!empty($request->input('idHosp')) || $request->input('idHosp' !== "")) {
            $hosp::where('id', $request->input('idHosp'))
            ->update($dados);
        } else {
            $hosp::create($dados);
        }

        return redirect("app/listHospedagem");
    }
    
    public function listagem(Request $request) 
    {
        $id = Auth::user()->id;

        // buscar e listar todas as hospedagens cadastradas pelo usuário logado, e enviar para a view
        $list = Hosp::where('userId', '=', $id)->get();

        return view('site.hospList', ['hospedagens' => $list]);
    }

    public function getHospedagem(Request $request, $id)
    {
        $retorno = Hosp::where('id', '=', $id)->get();

        return json_encode($retorno);
    }
}
