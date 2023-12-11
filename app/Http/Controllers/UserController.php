<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invite;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function reset($token)
    {
        $user = User::where('reset_token', $token)->first();
        if( !is_null( $user ) ){
            $data = [
                'token' => $token
            ];
            return view('Landing.reset-password', $data);
        }
        return redirect()->route('login')->with(['error' => 'Token de redefinição de senha não encontrado ou expirado.']);
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

    public function sendResetPasswordLink(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            $token = Str::random(30);
            $user->reset_token = $token;
            $user->save();

            $userDetails = [
                'name' => $user->firstname,
                'email' => $user->email,
            ];

            Mail::to($user->email)
                ->send(new ResetPasswordMail($token, $userDetails));

                return redirect()->back()->with('success', 'Link de redefinição de senha enviado por e-mail.');
        }
        return redirect()->back()->with(['error' => 'Não foi possível encontrar o usuário com este e-mail.']);
    }

    public function resetPassword (  ResetPasswordRequest $request ){
        $user = AdminUser::where('reset_token', $request->get('token'))->first();
        if( !is_null( $user ) ){
            $user->reset_token = null;
            $user->password = Hash::make( $request->get('password') );
            $user->save();
            return redirect()->route('admin.login')->with('success-message', 'Password has been reset successfully.');
        }
        return redirect()->back()->with('error-message', 'Reset password token not found.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
