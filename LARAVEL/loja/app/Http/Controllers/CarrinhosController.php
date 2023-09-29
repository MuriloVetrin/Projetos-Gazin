<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrinho;
use Illuminate\Support\Facades\Auth;

class CarrinhosController extends Controller
{

    public function show()
    {
        if (Auth::user()->type !== 'cliente') {
            return redirect()->route('produto.index')->with('error', 'Acesso não autorizado.');
        }

        $cliente = Auth::user();
        $itensCarrinho = Carrinho::where('cliente_id', $cliente->id)->get();
        return view('carrinho.show', compact('itensCarrinho'));
    }

    public function addItem(Request $request)
    {
        if (Auth::user()->type !== 'cliente') {
            return redirect()->route('produto.index')->with('error', 'Acesso não autorizado.');
        }

        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $cliente = Auth::user(); 

        $itemExistente = Carrinho::where('cliente_id', $cliente->id)
            ->where('produto_id', $request->input('produto_id'))
            ->first();

        if ($itemExistente) {

            $itemExistente->quantidade += $request->input('quantidade');
            $itemExistente->save();
        } else {

            Carrinho::create([
                'cliente_id' => $cliente->id,
                'produto_id' => $request->input('produto_id'),
                'quantidade' => $request->input('quantidade'),
            ]);
        }

        return redirect()->route('carrinho.show')->with('success', 'Produto adicionado ao carrinho.');
    }

    public function removeItem(Request $request, $id)
    {
        if (Auth::user()->type !== 'cliente') {
            return redirect()->route('produto.index')->with('error', 'Acesso não autorizado.');
        }

        Carrinho::where('id', $id)->delete();

        return redirect()->route('carrinho.show')->with('success', 'Produto removido do carrinho.');
    }

}
