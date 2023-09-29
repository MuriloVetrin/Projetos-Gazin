<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    // Exibe o painel do funcionário
    public function dashboard()
    {
        // Você pode personalizar esta ação para exibir informações relevantes para o funcionário
        return view('funcionarios.dashboard');
    }

    // Exibe o perfil do funcionário
    public function profile()
    {
        $funcionario = Auth::user(); // Obtém o funcionário autenticado
        return view('funcionarios.profile', compact('funcionario'));
    }

    // Exibe o formulário de edição do perfil do funcionário
    public function edit()
    {
        $funcionario = Auth::user(); // Obtém o funcionário autenticado
        return view('funcionarios.edit', compact('funcionario'));
    }

    // Atualiza o perfil do funcionário (remova esta ação se não quiser atualização)
    public function update(Request $request)
    {
        // Você pode remover completamente esta ação se não desejar a capacidade de atualizar o perfil do funcionário
    }

    // Adicione outras ações conforme necessário, como edição de senha e outras funcionalidades exclusivas para funcionários.
}
