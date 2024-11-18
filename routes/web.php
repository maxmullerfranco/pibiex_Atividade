<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Define uma rota GET para exibir o formulário de cadastro.
// Quando a URL '/cadastro' é acessada, o método 'showRegisterForm' da classe 'UserController' será chamado.
// A rota é nomeada como 'cadastro', o que permite referenciá-la em outras partes do código (por exemplo, ao gerar links).
Route::get('/cadastro', [UserController::class, 'showRegisterForm'])->name('cadastro');

// Define uma rota POST para processar o envio do formulário de cadastro.
// Quando o formulário de cadastro é enviado via POST para a URL '/cadastro', o método 'register' da classe 'UserController' será chamado.
Route::post('/cadastro', [UserController::class, 'register']);

// Define uma rota GET para exibir o formulário de login.
// Quando a URL '/login' é acessada, o método 'showLoginForm' da classe 'UserController' será chamado.
// A rota é nomeada como 'login', o que permite referenciá-la em outras partes do código.
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Define uma rota POST para processar o envio do formulário de login.
// Quando o formulário de login é enviado via POST para a URL '/login', o método 'login' da classe 'UserController' será chamado.
Route::post('/login', [UserController::class, 'login']);

// Define uma rota GET para a página inicial da aplicação, acessível apenas por usuários autenticados.
// Quando a URL '/index' é acessada, o método 'index' da classe 'UserController' será chamado.
// A rota possui um middleware 'auth', que garante que apenas usuários autenticados possam acessá-la.
// A rota é nomeada como 'index', permitindo fácil referência em outras partes do código.
Route::get('/index', [UserController::class, 'index'])->middleware('auth')->name('index');



