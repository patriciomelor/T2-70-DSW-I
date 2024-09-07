<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // <-- Añadir esta línea

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Usuario registrado con éxito.');
    }
    
    
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return back()->with('error', 'Credenciales incorrectas');
        }

        return redirect()->intended('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    // Mostrar el dashboard
    public function showDashboard()
    {
        return view('backoffice.dashboard');
    }
}
