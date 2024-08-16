<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // FORMULARIO DE INICIO DE SESIÓN
    public function formularioLogin()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.email' => 'El email no tiene un formato válido',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ];
    
        // Validación de la solicitud
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only('email', 'password');

        try {
            // Intentar autenticar y generar un token
            $token = JWTAuth::attempt($credentials);
            dd($token); // Depura el token
    
            if (!$token) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            // Redirigir al dashboard si el request no es JSON
            if (!$request->wantsJson()) {
                // Almacenar el token en la sesión para usarlo en la vista
                session(['token' => $token]);
    
                return redirect()->route('backoffice.dashboard');
            }
    
            return response()->json(compact('token'));
    
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
        
        
        
    }
    

    // FUNCIÓN DE CIERRE DE SESIÓN
    public function logout(Request $request)
    {
        try {
            // Invalida el token JWT
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json(['message' => 'Logout exitoso'], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Error al cerrar sesión, inténtelo nuevamente'], 500);
        }
    }

    // FORMULARIO DE CREACIÓN DE NUEVO USUARIO
    public function formularioNuevo()
    {
        if (Auth::check()) {
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    // FUNCIÓN DE REGISTRO DE USUARIO CON CIFRADO DE LA CONTRASEÑA
    public function registrar(Request $_request)
    {
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir contraseña es obligatorio.',
        ];
        $_request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required',
        ], $mensajes);

        $datos = $_request->only('nombre', 'email', 'password', 'rePassword');

        // Verificación de contraseña
        if ($datos['password'] != $datos['rePassword']) {
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no coinciden']);
        }

        try {
            // Creación del usuario
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                // Enmascaramiento de la contraseña
                'password' => Hash::make($datos['password']),
                'activo' => 1 // Establecer el campo activo en 1
            ]);

            // Respuesta en caso de éxito
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente.');
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                return back()->withErrors(['message' => 'Error: El usuario ya existe.']);
            }
            return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
