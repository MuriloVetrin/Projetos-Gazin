<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Estudante;
use App\Models\Sala;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{

    public function index()
    {
        $estudantes = Estudante::with('sala')->get();

        return view('estudantes.index', ['estudantes' => $estudantes]);
    }

    public function show(int $id)
    {
        $estudante = Estudante::with('sala')->find($id);
        return view('estudantes.show', ['estudante' => $estudante]);
    }

    public function create()
    {
        $salas = Sala::all();
        return view('estudantes.create', ['salas' => $salas]);
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
        $estudante->sala_id = $req->input('sala_id');
        $estudante->save();
    
        return redirect('/estudantes');
    }

    public function edit(int $id)
    {
        $estudante = Estudante::with('sala')->find($id);
        $salas = Sala::all();
        return view('estudantes.edit', compact('salas'), ['estudante' => $estudante]);
    }

    public function update(int $id, Request $req)  
    {
        $estudante = Estudante::find($id);
        $estudante->nome = $req->nome;
        $estudante->cpf = $req->cpf;
        $estudante->nascimento = $req->nascimento;

         if ($estudante->sala_id !== $req->sala_id) {

        $estudante->sala_id = $req->sala_id;
        }

        $estudante->save();

        return redirect('/estudantes');
    }

    public function destroy(int $id)  
    {
        $estudante = Estudante::find($id);
        $estudante->delete();
        return redirect('/estudantes');
    }
}
