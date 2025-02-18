<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->middleware('auth')->only('logout');
    }
     
    public function showLoginForm():View
    {
        return view('auth.login');
    }

    public function login(Request $request):RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, (bool) $request->remember)) {

            $request->session()->regenerate();

            return redirect()->intended(route('home'))->withStatus('Connexion reussie !');
            
            }

            return back()->withErrors([
            
            'email' => 'Identifiants erronés',
            
            ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
            Auth::logout();

            $request->session()->invalidate();
            
            $request->session()->regenerateToken();
            return redirect('/');
    }
}
