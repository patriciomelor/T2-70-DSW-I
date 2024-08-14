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
    
    public function login(Request $request)
    {
        $messages = [
            'email.email' => 'El email no tiene un formato válido',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ];
    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);
    
        $credentials = $request->only('email', 'password');
    
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            // Verifica si el usuario está activo antes de devolver el token
            $user = JWTAuth::setToken($token)->toUser();
            if (!$user->activo) {
                return response()->json(['error' => 'El usuario se encuentra desactivado'], 403);
            }
    
            // Devuelve el token JWT en la respuesta si el usuario está activo
            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);

        }
        $ttl = config('jwt.ttl');
        dd($ttl); // Para verificar si el valor es el esperado
    }
    
    
    
    //FUNCIÓN DE CIERRE DE SESIÓN
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
