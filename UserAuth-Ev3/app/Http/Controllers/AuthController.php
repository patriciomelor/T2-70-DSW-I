<?php
// en App\Http\Controllers\AuthController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        // Usar sesión para enviar mensaje flash
        $request->session()->flash('success', 'Usuario  Creado Correctamente');
        
        // Redirigir al usuario al login
        return redirect('/login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si la autenticación fue exitosa, redirigir al dashboard
            return redirect()->intended('dashboard');  // 'dashboard' debe ser la ruta donde está el backoffice
        }

        // Si la autenticación falla, redirigir de nuevo al formulario de login con un mensaje de error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
    
    
    

    

    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que esta vista existe en resources/views/auth/login.blade.php
    }
    public function showRegistrationForm()
{
    return view('auth.register'); // Asegúrate de que esta vista existe
}
}
