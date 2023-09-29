<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;


class ClientController extends Controller
{

    //index -> listar os clientes e ele retorna a view com o @retun view

    public function index()
    {
        //print_r('to aq1');
        $clients = Client::get();

        return view('clients.index', ['clients' => $clients]);
    }

    public function show(int $id)
    {

        $client = Client::find($id);
        return view('clients.show', [
            'client' => $client
        ]);
    }

    // mostra a view de criar novos clientes e o retorno deles é uma view

    public function create()
    {
        //print_r('to aq3');

        return view('clients.create');
    }

    //cria um novo cliente => @param Request @return Request

    public function store(Request $request)
    {
        try {


            $dados = $request->validate([
                'nome' => 'required',
                'endereco' => 'required',
                'observacao' => 'nullable',
                'cpf' => [
                    'required',
                    'digits:11',
                    Rule::unique('clients', 'cpf'),
                ],
            ]);
            $client = Client::create($dados);
            return redirect('/clients')->with('success', 'Cliente cadastrado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Cliente já cadastrado!');
        }
    }

    public function edit(int $id) // edit mostra o formulario de editar novo cliente => @param integer $id e o @return View
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }

    public function update(int $id, Request $req)  // update realiza a edição dos dados de um cliente => @param integer $id @param Request @request @return RedrectResponse
    {
        try {
            $dados = $req->validate([
                'nome' => 'required',
                'endereco' => 'required',
                'observacao' => 'nullable',
                'cpf' => [
                    'required',
                    'digits:11',
                    Rule::unique('clients', 'cpf')->ignore($id),
                ],
            ]);

            $client = Client::find($id);
            $client->update($dados);

            return redirect('/clients')->with('success', 'Cliente atualizado com sucesso!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', 'Cliente já cadastrado!');
            }
        }
    }

    public function destroy(int $id)  // destroy exclui o cliente => @param integer $id @return RedirecResponse
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/clients');
    }
}
