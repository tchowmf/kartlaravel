<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view("Landing.login");
    }

    public function register()
    {
        return view("Landing.register");
    }

    public function forgot()
    {
        return view("Landing.forgot-password");
    }

    public function create(Request $request)
    {
        $codigoInserido = $request->input('invite');

        $convite = Invite::where('codigo', $codigoInserido)->first();

        if ($convite && !$convite->used) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                // Outras regras de validação para os campos do formulário...
            ]);

            $user = new User;
            $user->firstname = $request->input("firstname");
            $user->lastname = $request->input("lastname");
            $user->email = $request->input("email");
            $user->password = Hash::make( $request->get('password') );
            $user->save();

            $convite->update(['used' => true]);

            return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
        }

        return redirect('/register')->withErrors(['message' => 'Código de Convite Inválido']);
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/karts'); // Redireciona para a página após o login
        }

        return redirect()->route('login')->with('error', 'Credenciais inválidas. Tente novamente.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
