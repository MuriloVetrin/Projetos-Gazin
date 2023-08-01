<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{

    public function index()
    {

        $estudantes = Estudante::get();

        return view('estudantes.index', ['estudantes' => $estudantes]);
    }

    public function show(int $id)
    {

        $estudantes = Estudante::find($id);
        return view('estudantes.show', [
            'estudantes' => $estudantes
        ]);
    }

    public function create()
    {
        return view('estudantes.create');
    }

    public function store(Request $req)
    {
        $estudante = new Estudante;
        $estudante->nome = $req->input('nome');
        $estudante->cpf = $req->input('cpf');
        $estudante->nascimento = \Carbon\Carbon::create(
            $req->input('ano_nasc'),
            $req->input('mes_nasc'),
            $req->input('dia_nasc')
        );
        $estudante->save();
    
        return redirect('/estudantes');
    }

    public function edit(int $id)
    {
        $estudantes = Estudante::find($id);
        return view('estudantes.edit', ['estudantes' => $estudantes]);
    }

    public function update(int $id, Request $req)  
    {
        $estudantes = Estudante::find($id);
        $estudantes->update([
            'nome' => $req->nome,
            'cpf' => $req->cpf,
            'nascimento' => $req->nascimento
        ]);
        return redirect('/estudantes');
    }

    public function destroy(int $id)  
    {
       $estudantes = Estudante::find($id);
       $estudantes->delete();
       return redirect('/estudantes');
    }
}

