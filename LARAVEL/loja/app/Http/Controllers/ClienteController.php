<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{

    public function dashboard()
    {

        return view('funcionarios.dashboard');
    }

    public function showLoginForm()
    {
        return view('funcionarios.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if ($credentials['password'] === '123') {

            Auth::guard('funcionario')->loginUsingId(1); 
            
            return redirect()->route('funcionario.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function logout()
    {
        Auth::guard('funcionario')->logout();
        return redirect()->route('funcionario.login');
    }

}
