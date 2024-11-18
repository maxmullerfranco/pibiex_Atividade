<?php

// Namespace para organizar o controlador dentro do diretório de Controllers do Laravel.
namespace App\Http\Controllers;

// Inclusão de classes necessárias para este controlador.
use Illuminate\Http\Request; // Para manipulação de requisições HTTP.
use Illuminate\Support\Facades\Auth; // Para autenticação de usuários.
use App\Models\User; // O modelo User, para manipulação de dados no banco de dados.
use Illuminate\Support\Facades\Hash; // Para fazer o hash da senha do usuário.

class UserController extends Controller
{
    // Método responsável por exibir o formulário de cadastro.
    public function showRegisterForm() {
        // Retorna a view 'cadastro', que é o formulário de cadastro.
        return view('cadastro');
    }

    // Método responsável por registrar um novo usuário.
    public function register(Request $request) {
        // Validação dos dados recebidos no formulário de cadastro.
        $request->validate([
            'name' => 'required', // Nome é obrigatório.
            'email' => 'required|email|unique:users', // E-mail é obrigatório, deve ser único na tabela 'users' e ser um e-mail válido.
            'password' => 'required|confirmed' // Senha é obrigatória e precisa ser confirmada (campo 'password_confirmation' deve ser igual).
        ]);

        // Criação de um novo usuário no banco de dados.
        User::create([
            'name' => $request->name, // Nome do usuário.
            'email' => $request->email, // E-mail do usuário.
            'password' => Hash::make($request->password), // Senha criptografada usando o Hash::make para maior segurança.
        ]);

        // Após a criação do usuário, redireciona o usuário para a rota 'login'.
        return redirect()->route('login');
    }

    // Método responsável por exibir o formulário de login.
    public function showLoginForm() {
        // Retorna a view 'login', que é o formulário de login.
        return view('login');
    }

    // Método responsável por processar o login do usuário.
    public function login(Request $request) {
        // Coleta apenas os campos 'email' e 'password' da requisição.
        $credentials = $request->only('email', 'password');

        // Verifica se as credenciais estão corretas, ou seja, se o e-mail e a senha estão válidos no banco de dados.
        if (Auth::attempt($credentials)) {
            // Se as credenciais estiverem corretas, redireciona para a rota 'index' (página inicial).
            return redirect()->route('index');
        }

        // Se as credenciais estiverem incorretas, retorna à página de login com um erro.
        return back()->withErrors(['email' => 'As credenciais estão incorretas.']);
    }

    // Método responsável por exibir a página inicial após o login.
    public function index() {
        // Retorna a view 'index' e passa o usuário autenticado para a view.
        return view('index', ['user' => Auth::user()]);
    }
}

