<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Crea el usuario
        $user = User::create([
            'nombre' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Genera el token JWT
        $token = JWTAuth::fromUser($user);

        // Opcional: Si quieres redirigir al dashboard o devolver el token
        return response()->json(['token' => $token]);
    }

    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Autenticar al usuario
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

        return response()->json(['token' => $token]);
    }

    // Mostrar el dashboard
    public function showDashboard()
    {
        return view('backoffice.dashboard');
    }
}
