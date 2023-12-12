<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            $userInfo = Auth::user();

            return view("Profile.profile", compact('userInfo'));
        }

        return redirect()->route('login');
    }

    public function settings()
    {
        if (Auth::check()) {
            $userInfo = Auth::user();

            return view("Profile.settings", compact('userInfo'));
        }

        return redirect()->route('login');
    }

    public function updatePasswordForm()
    {
        if (Auth::check()) {
            $userInfo = Auth::user();

            return view("Profile.update-password", compact('userInfo'));
        }

        return redirect()->route('login');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');

        // Verifica se a nova senha e a confirmcao coincidem
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'As senhas não coincidem.');
        }

        // Verifica se a senha atual fornecida corresponde à senha armazenada no banco de dados
        if (Hash::check($currentPassword, $user->password)) {
            // Senha atual fornecida está correta, então atualize a senha
            $user->password = Hash::make($newPassword);
            $user->save();

            return redirect()->back()->with('success', 'Senha atualizada com sucesso.');
        }

        return redirect()->back()->with('error', 'A senha atual está incorreta. Tente novamente.');
    }
}
