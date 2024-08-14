<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{

    //FORMULARIO DE INICIO DE SESIÓN
    public function formularioLogin(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }
    
    //FUNCIÓN DE INICIO DE SESIÓN
    public function login(Request $request)
{
    $mensajes = [
        'email.email' => 'El email no tiene un formato válido',
        'email.required' => 'El email es obligatorio',
        'password.required' => 'La contraseña es obligatoria'
    ];

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], $mensajes);

    $credentials = $request->only('email', 'password');

    try {
        // Intenta autenticar al usuario y generar el token JWT
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } catch (JWTException $e) {
        return response()->json(['error' => 'Could not create token'], 500);
    }

    // Verifica si el usuario está activo
    $user = Auth::user();
    if (!$user->activo) {
        return response()->json(['error' => 'El usuario se encuentra desactivado'], 403);
    }

    // Devuelve el token JWT en la respuesta
    return response()->json(compact('token'));
}
    
    //FUNCIÓN DE CIERRE DE SESIÓN
    public function logout(Request $_request){
        Auth::logout();
        $_request->session()->invalidate();
        $_request->session()->regenerateToken();
        return redirect()->route('usuario.login');
    }
    
    //FORMULARIO DE CREACIÓN DE NUEVO USUARIO
    public function formularioNuevo(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    //FUNCIÓN DE REGISTRO DE USUARIO CON CIFRADO DE LA CONTRASEÑA
    public function registrar(Request $_request){

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir contraseña es obligatorio.',
            'dayCode.required' => 'El código del día es obligatorio.',
        ];
        $_request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required',
            'dayCode' => 'required',
        ], $mensajes);
                
        $datos = $_request->only('nombre', 'email', 'password', 'rePassword', 'dayCode');

        // Verificación de contraseña
        if($datos['password'] != $datos['rePassword']){
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no coinciden']);
        }

        // Verificación del código del día
        date_default_timezone_set('UTC');
        if($datos['dayCode'] != date("d")){
            return back()->withErrors(['message' => 'El código del día no es válido.']);
        }

        try {
            //Creación del usuario
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                //Enmascaramiento de la contraseña
                'password' => Hash::make($datos['password'])
            ]);
            //Respuesta en caso de éxito
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente.');
        //Manejo de los errores
        } catch (Exception $e) {
            if($e->getCode()==23000){
                return back()->withErrors(['message'=>'Error: El usuario ya existe.']);
            }
            return back()->withErrors(['message' => 'Error: '. $e->getMessage()]);
        }        
    }
}
