<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ClienteController@index');

// Rotas autenticadas (requerem login)

Route::middleware(['auth'])->group(function () {
    // Rota de logout
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // Rota do perfil do usuário (cliente ou funcionário)
    Route::get('/profile', 'ClienteController@show')->name('profile');
    Route::get('/profile/edit', 'ClienteController@edit')->name('profile.edit');
    Route::post('/profile/update', 'ClienteController@update')->name('profile.update');

    // Rotas relacionadas a produtos (apenas para funcionários)
    Route::middleware(['funcionario'])->group(function () {
        Route::resource('produtos', 'ProdutoController')->except(['show']);
    });

    // Rota do carrinho (apenas para clientes)
    Route::middleware(['cliente'])->group(function () {
        Route::get('/carrinho', 'CarrinhosController@show')->name('carrinho.show');
    });
});
