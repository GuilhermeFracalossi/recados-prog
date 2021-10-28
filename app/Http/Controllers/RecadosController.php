<?php

namespace App\Http\Controllers;

use App\Models\Recado;
use Illuminate\Http\Request;

class RecadosController extends Controller {

    public function index() {
        //retorna os recados na ordem do mais novo para o mais antigo
        $recados = Recado::orderBy('id', 'desc')->get();

        return view('recados.index', ['recs' => $recados, 'pagina' => 'recados']);
    }

    //redireciona para a pagina de cadastro
    public function create() {
        return view('recados.create', ['pagina' => 'recados']);
    }

    //cadastrar um produto ao clicar em "Gravar" no cadastro de recados
    public function insert(Request $form) {
        $rec = new Recado();

        //campos para serem salvos
        $rec->nome = $form->nome;
        $rec->comentario = $form->comentario;

        $rec->save();

        //redireciona para a listagem
        return redirect()->route('recados');
    }

    public function edit(Recado $rec) {
        //redireciona para a tela de edicao de recado
        return view('recados.edit', ['rec' => $rec, 'pagina' => 'recados']);
    }

    public function update(Request $form, Recado $rec) {
        //campos para serem editados
        $rec->nome = $form->nome;
        $rec->comentario = $form->comentario;

        $rec->save();

        //redireciona para a listagem
        return redirect()->route('recados');
    }

    public function delete(Recado $rec) {
        //deleta um recado
        $rec->delete();

        //redireciona para a listagem
        return redirect()->route('recados');
    }
}
