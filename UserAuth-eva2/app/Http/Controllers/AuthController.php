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

        return redirect()->route('backoffice.dashboard')->with('success', 'Usuario registrado con éxito.');
    }


    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    try {
        
        if (!$token = JWTAuth::attempt($credentials)) {
            dd('Entró al try');
            return back()->with('error', 'Credenciales incorrectas');
        }

        // Redirige a la ruta del dashboard de backoffice
        dd('Redirige al dashboard');
        return redirect()->route('dashboard');

    } catch (Exception $e) {
        // Maneja el error, por ejemplo, registrar el error
        return back()->with('error', 'Ocurrió un error al intentar autenticar.');
        
    }
}

    public function logout()
    {
        dd('Fué a logout');
        Auth::logout();
        return redirect('/login');
    }
    // Mostrar el dashboard
    public function showDashboard()
    {
        return view('backoffice.dashboard');
    }
}
