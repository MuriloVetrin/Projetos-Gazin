<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }
    
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function create()
    {
        if (Auth::user()->type === 'funcionario') {
            return view('produtos.create');
        } else {
            return redirect()->route('produtos.index')->with('error', 'Acesso não autorizado.');
        }
    }

    public function store(Request $request)
    {

        if (Auth::user()->type !== 'funcionario') {
            return redirect()->route('produtos.index')->with('error', 'Acesso não autorizado.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produto = new Produto([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produtos');
            $produto->image = $imagePath;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso.');
    }

}

