<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionarCarrinho'])->name('site.addcarrinho');
Route::delete('/remover/{id}', [CarrinhoController::class, 'removerCarrinho'])->name('site.deletecarrinho');
Route::put('/atualizar/{id}', [CarrinhoController::class, 'atualizarCarrinho'])->name('site.putcarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.clearcarrinho');
/*
//ROUTES
Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function () {
    return view('empresa');
});
Route::get('/sobre', function () {
    return view('sobre');
});

Route::any('/any', function () {
    return "Permite todo tipo de acesso http (put, delete, get, port)";
});

//limitar tipos de acesso à rotas
Route::match(['delete', 'post'], '/match', function () {
    return "Permite apenas acessos definidos";
});

// rotas usando parametros
Route::get('/produto/{id}/{cat?}', function ($id, $cat = '') {

    return "O id do produto é " . $id . "<br>" . "A categoria é: " . $cat;
});

//sobrescrever rotas forma 1
Route::get('/sobre', function () {
    return redirect('/empresa');
});

//forma 2(não funcionou tentei varias possibilidades)

Route::redirect('/sobre', '/empresa');

Route::get('/news', function () {
    return view('news');
})->name('noticias');


//importante para quando precisa mudar a rota e continuar direcionando para mesma rota tranquilamente
Route::get('/novidades', function () {
    return redirect()->route('noticias');
});

//criando grupos por prefix
Route::prefix('admin')->group(function () {

    Route::get('dashboard', function () {
        return "dashboard";
    })->name('admin.dashboard');

    Route::get('users', function () {
        return "users";
    });

    Route::get('clientes ', function () {
        return "clientes";
    });
});


//grupo por apelido(name)
Route::name('admin.')->group(function () {

    Route::get('dashboard', function () {
        return "dashboard";
    })->name('dashboard');

    Route::get('users', function () {
        return "users";
    })->name('users');

    Route::get('clientes ', function () {
        return "clientes";
    })->name('clientes');
});

//prefix e name juntos
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {


    Route::get('dashboard', function () {
        return "dashboard";
    })->name('dashboard');


    Route::get('users', function () {
        return "users";
    })->name('users');


    Route::get('clientes ', function () {
        return "clientes";
    })->name('clientes');
});
*/