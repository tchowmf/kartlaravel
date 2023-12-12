<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invite;
use App\Mail\ResetPasswordMail;
use App\Mail\EmailVerification;
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

            $user = $this->createUser($request->all());

            if ($user) {

                $convite->update(['used' => true]);

                $this->sendEmailVerify($user);

                return redirect('/login')->with('success', 'Cadastro realizado com sucesso! Verifique seu e-mail.');
            }
        }

        return redirect('/register')->withErrors(['message' => 'Código de Convite Inválido']);
    }

    public function sendVerificationEmail(User $user)
    {
        // Verifica se o usuário ainda não confirmou o e-mail
        if ($user->email_verified_at == null) {
            $this->sendEmailVerify($user);
            return redirect()->back()->with('success', 'Email de verificação reenviado com sucesso.');
        }

        return redirect()->route('profile')->with('info', 'Seu e-mail já foi verificado.');
    }

    protected function sendEmailVerify(User $user)
    {
        $userDetails = ['name' => $user->firstname];
        Mail::to($user->email)->send(new EmailVerification($user->email_verification_token, $userDetails));
    }

    protected function createUser(array $data)
    {
        $token = Str::random(30);

        $user = new User;
        $user->firstname = $data["firstname"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->password = Hash::make($data['password']);
        $user->email_verification_token = $token;

        $user->save();


        return $user;
    }

    public function confirmEmail(Request $request)
    {
        $expires = $request->input('expires');
        $token = $request->input('token');
        $signature = $request->input('signature');

        // Faça as verificações necessárias para garantir a validade do token, se ele ainda está dentro do prazo de validade, se a assinatura é válida, etc.

        // Se as verificações forem bem-sucedidas, atualize o campo 'email_verified_at'
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now(); // Defina como o timestamp atual para indicar a confirmação
            $user->save();

            return redirect('/login')->with('success', 'Seu e-mail foi verificado com sucesso! Faça login para continuar.');
        }

        return redirect('/login')->with('error', 'Falha na verificação do e-mail. Tente novamente.');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $is_remember = $request->has('remember-me');

        if (Auth::attempt($credentials, $is_remember)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/karts'); // Redireciona para a página após o login
        }

        return redirect()->route('login')->with('error', 'Credenciais inválidas. Tente novamente.');
    }

    public function reset($token)
    {
        if ($this->isTokenValid($token)) {
            $user = User::where('reset_token', $token)->first();
            if (!is_null($user)) {
                $data = [
                    'token' => $token
                ];
                return view('Landing.reset-password', $data);
            }
        }
        return redirect()->route('login')->with(['error' => 'Token de redefinição de senha não encontrado ou expirado.']);
    }

    public function sendResetPasswordLink(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            $token = Str::random(30);
            $user->reset_token = $token;
            $user->token_expires_at = now()->addMinutes(15);
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

    public function isTokenValid($token)
    {
        $user = User::where('reset_token', $token)
                    ->where('token_expires_at', '>', now()) // Verifica se o token ainda não expirou
                    ->first();

        return $user !== null;
    }

    public function clearExpiredTokens()
    {
        User::where('token_expires_at', '<', now())->update([
                        'reset_token' => null,
                        'token_expires_at' => null
        ]);
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('reset_token', $request->get('token'))->first();

        if( !is_null($user) ){
            $user->reset_token = null;
            $user->password = Hash::make( $request->get('password') );
            $user->save();
            return redirect()->route('login')->with('success', 'A senha foi redefinida com sucesso.');
        }
        return redirect()->route('login')->with(['error' => 'Token de redefinição de senha não encontrado ou expirado.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
