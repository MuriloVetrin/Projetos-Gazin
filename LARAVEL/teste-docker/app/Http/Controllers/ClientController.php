<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    //index -> listar os clientes e ele retorna a view com o @retun view

    public function index()
    {

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
        return view('clients.create');
    }

    //cria um novo cliente => @param Request @return Request

    public function store(Request $req)
    {
        $dados = $req->except('_token'); // except => remolve o token para poder gravar só os dados que importam para nós
        Client::create($dados);
        return redirect('/clients');
    }

    public function edit(int $id) // edit mostra o formulario de editar novo cliente => @param integer $id e o @return View
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }

    public function update(int $id, Request $req)  // update realiza a edição dos dados de um cliente => @param integer $id @param Request @request @return RedrectResponse
    {
        $client = Client::find($id);
        $client->update([
            'nome' => $req->nome,
            'endereco' => $req->endereco,
            'observacao' => $req->observacao
        ]);
        return redirect('/clients');
    }

    public function destroy(int $id)  // destroy exclui o cliente => @param integer $id @return RedirecResponse
    {
       $client = Client::find($id);
       $client->delete();
       return redirect('/clients');
    }
}
